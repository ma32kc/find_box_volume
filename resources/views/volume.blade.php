<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Расчет объема коробки</title>
</head>
<body>
    <h1>Расчет объема коробки</h1>

    <div class="main">
        <form method="POST" action="{{ route('calculate.volume') }}">
            @csrf
    
            <x-forms.item name="length" title="Длина коробки:" select required/>
            <x-forms.item name="width" title="Ширина коробки:" select required/>
            <x-forms.item name="height" title="Высота коробки:" select required/>
            <x-forms.item name="quantity" title="Количество коробок (шт.):" required/>
            <x-forms.item name="single_volume" title="Объем одной коробки:" select readonly cube="³" sessionValue="{{ session('singleVolume', '') }}"/>
            <x-forms.item name="total_volume" title="Общий объем всех коробок:" select readonly cube="³" sessionValue="{{ session('totalVolume', '') }}"/>
            <button type="submit">Рассчитать объем</button>
        </form>
    
        <div class="theory">
            <h3>Теория</h3>
            <p>Коробка — это прямоугольный параллелепипед, который имеет длину Д, ширину Ш и высоту (глубину) В.</p>
            <p>Формула для расчета объема коробки: <br> V = Д * Ш * В</p>
            <p>Пример: <br> Для коробки с длиной 56 см, шириной 40 см и высотой 32 см:</p>
            <p>V = 56 * 40 * 32 = 71680 см³ <br> 
            V (в кубометрах) = 71680 / 1000000 = 0.07168 ≈ 0.07 м³</p>
        </div>
    </div>
</body>
</html>
