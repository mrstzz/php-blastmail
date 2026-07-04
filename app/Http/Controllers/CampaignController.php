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
            ->appends(compact('search','withTrashed')),
            'search'=> $search,
            'withTrashed' => $withTrashed
        ]);
    }

    function create(?string $tab = null) 
    {
        return view('campaigns.create',[
            'tab' => $tab,
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

    function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return back()->with('message',__('Campaign successfully deleted!'));
    }


    function restore(Campaign $campaign)
    {
        $campaign->restore();

        return back()->with('message',__('Campaign successfully restored!'));
    }


}
