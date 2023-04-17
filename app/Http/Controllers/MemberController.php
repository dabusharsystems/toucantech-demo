<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(Request $request, School $school)
    {
        $school = School::all();
        $members = DB::table('members')
            ->join('schools', 'members.school_id', '=', 'schools.id')
            ->select('members.*', 'schools.name as school_name')
            ->get();

        return view('members.index', compact('members', 'school'));
    }

    public function create()
    {
        $schools = School::all();
        return view('members.create', compact('schools'));
    }


    public function store(Request $request)
    {
        $member = new Member;
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->school_id = $request->input('school');
        $member->save();

        DB::table('member_school')->insert([
            'member_id' => $member->id,
            'school_id' => $request->input('school'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $schools = $request->input('schools');
        $member->schools()->attach($schools);

        return redirect()->back();
    }



public function show(Member $member)
    {
        return view('member.show', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->school_id = $request->input('school_id');
        $member->save();
       /* DB::table('member_school')->update([
            'member_id' => $member->id,
            'school_id' => $request->input('school'),
            'created_at' => now(),
            'updated_at' => now()
        ]);*/
        return redirect()->route('member.show', $member->id);
    }

    public function membersBySchool(School $school)
    {
        $members = $school->members;
        return view('member.school', compact('members', 'school'));
    }

}
