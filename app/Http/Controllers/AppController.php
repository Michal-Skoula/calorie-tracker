<?php

namespace App\Http\Controllers;

use App\Models\NutritionData;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI\Laravel\Facades\OpenAI;

class AppController extends Controller
{
	public function index()
	{
		$user_id = Auth::user()->id;
//		$settings = tbd
		$data = NutritionData::orderBy('created_at', 'desc')
			->where('user_id', $user_id)
			->simplePaginate(30);


		return view('dashboard', ['data' => $data]);
	}

    public function add()
	{
		return view('add');
	}

	public function store(Request $request)
	{
		$request->validate([
			'food_image' => 'required|file|mimes:jpeg,png,jpg,webp|max:8192',
			'food_description' => 'string',
		]);

		$file = $request->file('food_image');
		$food_description = $request->food_description ?? '';
		$base64Image = '';

		if($file && $file->isValid()){
			$file_contents = file_get_contents($file->getRealPath());
			$base64 = base64_encode($file_contents);

			$mimeType = $file->getMimeType();
			$base64Image = 'data:' . $mimeType . ';base64,' . $base64;

			$result = OpenAI::chat()->create([
				'model' => 'gpt-4o',
				'messages' => [
					(object) [
						'role' => 'system',
						'content' => [
							(object)[
								'type' => 'text',
								'text' => 'You are an expert nutritionist. Your job is to analyze the nutritional content of a meal based on the provided picture. The user may also provide a description, which you should factor in when analyzing the meal. If you do not recognize the image provided as food, Keep the `food_name` field as null and the rest as `0`. **Piš své odpovědi POUZE v češtině** 

								Return the data as a JSON object with the following keys:
								- `food_name`: string | Descriptive name of the meal. 
								- `calories`: int |Estimated number of calories in the meal.
								- `carbs`: int | Estimated number of carbs in the meal.
								- `sugar` int |Estimated number of sugar in the meal.
								- `protein` int |Estimated number of protein in the meal.
								- `fat` int |Estimated number of fat in the meal.
								- `fiber` int | Estimated number of fiber in the meal.
								
								If you are unsure of a value, leave it as empty.',
							],
						]
					],
					(object) [
						'role' => 'user',
						'content' => [
							(object)[
								'type' => 'text',
								'text' => $food_description,
							],
							(object)[
								'type' => 'image_url',
								'image_url' => (object)['url' => "$base64Image"],
							]
						]
					]
				],
				'response_format' => (object)[
					'type' => 'json_object',
				],
				'temperature'=> 1,
				'max_completion_tokens' => 2048,
				'top_p' => 1,
				'frequency_penalty' => 0,
				'presence_penalty' => 0
			]);
			$choices = $result->toArray();
			$json = json_decode($choices['choices'][0]['message']['content']);

			NutritionData::create([
				'user_id' 	=> Auth::user()->id,
				'food_name' => $json->food_name,
				'calories' 	=> $json->calories,
				'carbs' 	=> $json->carbs,
				'sugar' 	=> $json->sugar,
				'protein' 	=> $json->protein,
				'fats' 		=> $json->fat,
				'fiber' 	=> $json->fiber,
			]);
			return route('dashboard');
		}
		else {
			return back()->withErrors(['food_image' => 'Invalid image.']);
		}


	}

	public function settings()
	{
//		return view('settings');
	}
}
