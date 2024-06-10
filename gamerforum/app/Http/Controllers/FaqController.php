<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqItems')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = FaqCategory::all();
        return view('faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        FaqItem::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ added successfully!');
    }

    public function edit($id)
    {
        $faq = FaqItem::findOrFail($id);
        $categories = FaqCategory::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:faq_categories,id',
        ]);

        $faq = FaqItem::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy($id)
    {
        $faq = FaqItem::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }
}
