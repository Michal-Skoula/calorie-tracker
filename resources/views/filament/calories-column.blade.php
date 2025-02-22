@php
   use Filament\Support\Colors\Color;
   
   $color = '';
   $calories = $getRecord()->meals()->sum('calories');
   if($getRecord()->bulking_or_cutting === App\BulkingOrCuttingEnum::Cutting) {
       $calories < $getRecord()->calorie_goal ? $color = Color::Green[600] : $color = Color::Red[600];
   }
   else {
	    $calories > $getRecord()->calorie_goal ? $color = Color::Green[600] : $color = Color::Red[600];
   }
   if($calories === 0) {
	   $color = Color::Yellow[500];
   }
   
@endphp

<div class="text-red-600">
   <p class="fi-ta-text-item-label text-sm leading-6 text-gray-600 dark:text-white/70">
      <span class="font-semibold" style="color:rgb({{$color}})"> {{$calories}}</span>
      <span class="text-gray-950 dark:text-white">/</span>
      {{$getRecord()->calorie_goal}} kcal
   </p>
</div>