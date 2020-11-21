<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\Blog;
use App\Model\Admin\BlogCategory;
use App\Model\Admin\Skill;
use App\Model\Admin\Tips;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function information()
    {
        return view('frontend.information');
    }
    public function softSkill()
    {
        $admin = Admin::all();
        $softSkill = Skill::where('category','soft skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);

        return view('frontend.skill_development.softskill')
            ->with([
                'skills'=>$softSkill,
                'admins'=>$admin
            ]);
    }

    public function academicSkill()
    {
        $admin = Admin::all();
        $academicSkill = Skill::where('category','academic skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);

        return view('frontend.skill_development.academic')
            ->with([
                'skills'=>$academicSkill,
                'admins'=>$admin
            ]);
    }
    public function professionalSkill()
    {
        $admin = Admin::all();
        $professionalSkill = Skill::where('category','professional skill')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return view('frontend.skill_development.professional')
            ->with([
                'skills'=>$professionalSkill,
                'admins'=>$admin
            ]);
    }
    public function skillDetails($slug)
    {
        $skillDetails = Skill::where('status',1)
            ->where('slug',$slug)
            ->first();
        return $skillDetails;
    }
    public function interviewTips()
    {
        $interview = Tips::where('category','interview')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        $mostPopular = Tips::orderByDesc('id')->limit(5)->get();

        return view('frontend.tips_and_tricks.interview')
            ->with([
                'interviews'=>$interview,
                'populars'=>$mostPopular
            ]);
    }

    public function educationalTips()
    {
        $educational = Tips::where('category','educational')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $educational;
    }

    public function careerAndPlaningTips()
    {
        $career = Tips::where('category','career and planing')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $career;
    }

    public function othersTips()
    {
        $others = Tips::where('category','others')
            ->where('status',1)
            ->orderByDesc('id')
            ->paginate(9);
        return $others;
    }

    public function tipsDetails($slug)
    {
        return $slug;
    }

    public function blog()
    {
        $categories = BlogCategory::where('status',1)->orderByDesc('id')->get();
        $blogs = Blog::where('status',1)->orderByDesc('id')->get();
        $admins = Admin::all();
        return view('frontend.blog.blog')
            ->with([
                'categories'=>$categories,
                'blogs'=>$blogs,
                'admins'=>$admins
            ]);
    }
    public function category($category)
    {
        return $category;
    }
}
