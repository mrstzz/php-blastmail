<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Database\Eloquent\Builder;


class CampaignController extends Controller
{
    function index()
    {
        $search = request()->get('search',null);
        $withTrashed = request()->get('withTrashed',false);
        return view('campaigns.index', [
            'campaigns' => Campaign::query()
            ->when($withTrashed,fn(Builder $query) =>$query->withTrashed())
            ->when($search,fn(Builder $query) => $query->where('name','like',"%$search%")->orWhere('id','=',"$search"))
            ->paginate(5)
            ->appends(compact('search')),
            'search'=> $search,
            'withTrashed' => $withTrashed
        ]);
    }

    function create()
    {
        return view('campaigns.create',[
            'templates' => Template::all()
        ]);
    }

    function store(Request $request)
    {
        $data = request()->validate([
            'name' => ['required','string','max:255'],
            'template_id' => ['required','exists:templates,id'],
            'email_list_id' => ['required','exists:email_lists,id']
        ]);

        Campaign::create($data);

        return to_route('campaigns.index')->with('message',__('Campaign successfully created!'));
    }


    function show(Campaign $campaign)
    {
        return view('campaigns.show',[
            'campaign' => $campaign
        ]);
    }

    function edit(Campaign $campaign)
    {
        return view('campaigns.edit',[
            'campaign' => $campaign,
            'templates' => Template::all()
        ]);
    }

    function update(Request $request, Campaign $campaign)
    {
        $data = request()->validate([
            'name' => ['required','string','max:255'],
            'template_id' => ['required','exists:templates,id'],
            'email_list_id' => ['required','exists:email_lists,id']
        ]);

        $campaign->update($data);

        return to_route('campaigns.index')->with('message',__('Campaign successfully updated!'));
    }

    function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return back()->with('message',__('Campaign successfully deleted!'));
    }


}
