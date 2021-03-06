<?php

namespace Spl\Domain\Page;

use Spl\Http\Controller;
use App\Page\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        view('page/index', [
            'title' => 'Pages'
        ]);
    }

    public function show($id)
    {
        $page = Page::factory()->where('id', $id)->get();

        view('page/show', [
            'title' => $page->title
        ]);
    }

    public function create()
    {
        
    }
}