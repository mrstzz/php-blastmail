<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignStoreRequest;
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
        // dd(session('campaigns::create'));

        // session()->forget('campaigns::create');

        return view('campaigns.create',[
            'tab' => $tab,
            'form' => match($tab){
                'template' => '_template',
                'schedule' => '_schedule',
                default => '_config'
            },
            'data' => session()->get('campaigns::create',[
                'name' => null,
                'subject' => null,
                'email_list_id' => null,
                'template_id' => null,
                'body' => null,
                'track_click' => null,
                'track_open' => null,
                'send_at' => null
            ]),

        ]);
    }

    function store(CampaignStoreRequest $request, ?string $tab = null)
    {

        $data = $request->getData();
        $toRoute = $request->getToRoute();


        if($tab == 'schedule'){
            Campaign::create($data);
        }

        return response()->redirectTo($toRoute);

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
