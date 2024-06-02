<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VolumeController extends Controller
{
    public function showForm() {
        return view('volume');
    }

    public function calculate(Request $request)
    {
        // Получение входных данных
        $length = $request->input('length');
        $lengthUnit = $request->input('length_unit');
        $width = $request->input('width');
        $widthUnit = $request->input('width_unit');
        $height = $request->input('height');
        $heightUnit = $request->input('height_unit');
        $quantity = $request->input('quantity', 1);

        $singleVolumeUnit = $request->input('single_volume_unit');
        $totalVolumeUnit = $request->input('total_volume_unit');

        // Валидация входных данных
        $request->validate([
            'length' => 'required|integer|min:1',
            'width' => 'required|integer|min:1',
            'height' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:1'
        ]);

        // Преобразование всех размеров в метры
        $length = $this->convertToMeters($length, $lengthUnit);
        $width = $this->convertToMeters($width, $widthUnit);
        $height = $this->convertToMeters($height, $heightUnit);

        // Расчет объема одной коробки в кубических метрах
        $singleVolume = $length * $width * $height;

        // Общий объем всех коробок
        $totalVolume = $singleVolume * $quantity;

        // Преобразование объема в нужные единицы измерения
        $singleVolume = $this->convertVolume($singleVolume, $singleVolumeUnit);
        $totalVolume = $this->convertVolume($totalVolume, $totalVolumeUnit);

        return back()->with([
            'singleVolume' => number_format($singleVolume, 9),
            'totalVolume' => number_format($totalVolume, 9)
        ])->withInput();
    }

    private function convertToMeters($value, $unit)
    {
        switch ($unit) {
            case 'mm':
                return $value / 1000;
            case 'cm':
                return $value / 100;
            case 'm':
                return $value;
            default:
                return $value;
        }
    }

    private function convertVolume($volume, $unit)
    {
        switch ($unit) {
            case 'mm³':
                return $volume * 1000000000; // кубометры в кубические сантиметры
            case 'cm³':
                return $volume * 1000000; // кубометры в кубические сантиметры
            case 'm³':
                return $volume; // уже в кубометрах
            default:
                return $volume;
        }
    }
}
