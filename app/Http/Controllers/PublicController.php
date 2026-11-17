<?php

namespace App\Http\Controllers;

use App\Services\DelOlympicData;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $stats = DelOlympicData::getStats();
        $categories = DelOlympicData::getCategories();
        $allCompetitions = DelOlympicData::getCompetitions();
        $featuredCompetitions = array_filter($allCompetitions, fn($c) => $c['featured']);

        return view('pages.home', compact('stats', 'categories', 'featuredCompetitions'));
    }

    public function competitions(Request $request)
    {
        $allCompetitions = DelOlympicData::getCompetitions();
        $categories = DelOlympicData::getCategories();

        $search = $request->query('search', '');
        $selectedCategory = $request->query('kategori', 'all');
        $selectedStatus = $request->query('status', 'all');

        $filtered = array_filter($allCompetitions, function ($item) use ($search, $selectedCategory, $selectedStatus) {
            $matchSearch = empty($search) || 
                stripos($item['title'], $search) !== false || 
                stripos($item['description'], $search) !== false || 
                stripos($item['organizer'], $search) !== false;

            $matchCategory = ($selectedCategory === 'all') || ($item['category_id'] === $selectedCategory);
            $matchStatus = ($selectedStatus === 'all') || ($item['status_pendaftaran'] === $selectedStatus);

            return $matchSearch && $matchCategory && $matchStatus;
        });

        return view('pages.competitions', [
            'competitions' => $filtered,
            'categories' => $categories,
            'search' => $search,
            'selectedCategory' => $selectedCategory,
            'selectedStatus' => $selectedStatus,
        ]);
    }

    public function competitionDetail($id)
    {
        $allCompetitions = DelOlympicData::getCompetitions();
        $competition = collect($allCompetitions)->firstWhere('id', (int) $id);

        if (!$competition) {
            abort(404, 'Kompetisi tidak ditemukan.');
        }

        return view('pages.competition-detail', compact('competition'));
    }

    public function registerForm($id)
    {
        $allCompetitions = DelOlympicData::getCompetitions();
        $competition = collect($allCompetitions)->firstWhere('id', (int) $id);

        if (!$competition) {
            abort(404, 'Kompetisi tidak ditemukan.');
        }

        return view('pages.competition-register', compact('competition'));
    }

    public function submitRegister(Request $request, $id)
    {
        // Validasi dan alur submit pendaftaran
        $request->validate([
            'cabang_id' => 'required',
            'team_name' => 'required|string|max:100',
            'leader_name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string',
            'institution' => 'required|string',
        ]);

        return redirect()->route('peserta.pendaftaran')->with('success', 'Pendaftaran untuk tim ' . $request->team_name . ' berhasil diajukan dan sedang menunggu verifikasi oleh Penyelenggara!');
    }

    public function about()
    {
        return view('pages.about');
    }
}
