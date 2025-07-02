<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HauraFeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_cerita' => 'required|exists:haura_ceritas,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        $data['id_user'] = auth()->id();

        HauraFeedback::updateOrCreate(
            ['id_user' => $data['id_user'], 'id_cerita' => $data['id_cerita']],
            ['rating' => $data['rating'], 'komentar' => $data['komentar']]
        );

        return back()->with('success', 'Terima kasih atas feedbackmu!');
    }
}
