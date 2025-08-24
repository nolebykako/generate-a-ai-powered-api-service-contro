<?php

/**
 * ULAH Generate AI-Powered API Service Controller
 *
 * This API service controller provides a set of endpoints for interacting with 
 * AI-powered models for generating content, such as text, images, and music.
 *
 * Endpoints:
 *  - POST /generate/text: generates a text based on the input prompt
 *  - POST /generate/image: generates an image based on the input prompt
 *  - POST /generate/music: generates a music piece based on the input prompt
 *  - GET /models: returns a list of available AI models
 *  - GET /models/{model_id}: returns the details of a specific AI model
 */

namespace ULAH.GenerateAI;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AIModel;

class AIController extends Controller
{
    /**
     * Generate text based on the input prompt
     *
     * @param Request $request
     * @return Response
     */
    public function generateText(Request $request)
    {
        $prompt = $request->input('prompt');
        $model_id = $request->input('model_id');

        $ai_model = AIModel::find($model_id);
        if (!$ai_model) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        $generated_text = $ai_model->generateText($prompt);
        return response()->json(['text' => $generated_text], 200);
    }

    /**
     * Generate image based on the input prompt
     *
     * @param Request $request
     * @return Response
     */
    public function generateImage(Request $request)
    {
        $prompt = $request->input('prompt');
        $model_id = $request->input('model_id');

        $ai_model = AIModel::find($model_id);
        if (!$ai_model) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        $generated_image = $ai_model->generateImage($prompt);
        return response()->json(['image' => $generated_image], 200);
    }

    /**
     * Generate music based on the input prompt
     *
     * @param Request $request
     * @return Response
     */
    public function generateMusic(Request $request)
    {
        $prompt = $request->input('prompt');
        $model_id = $request->input('model_id');

        $ai_model = AIModel::find($model_id);
        if (!$ai_model) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        $generated_music = $ai_model->generateMusic($prompt);
        return response()->json(['music' => $generated_music], 200);
    }

    /**
     * Get a list of available AI models
     *
     * @return Response
     */
    public function getModels()
    {
        $models = AIModel::all();
        return response()->json(['models' => $models], 200);
    }

    /**
     * Get the details of a specific AI model
     *
     * @param Request $request
     * @return Response
     */
    public function getModel(Request $request)
    {
        $model_id = $request->route('model_id');
        $ai_model = AIModel::find($model_id);
        if (!$ai_model) {
            return response()->json(['error' => 'Model not found'], 404);
        }
        return response()->json(['model' => $ai_model], 200);
    }
}