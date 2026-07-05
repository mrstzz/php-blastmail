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

    function store(?string $tab = null)
    {

        $toRoute = '';
        $map = array_merge([
            'name' => null,
            'subject' => null,
            'email_list_id' => null,
            'template_id' => null,
            'body' => null,
            'track_click' => null,
            'track_open' => null,
            'send_at' => null
        ], request()->all());



        if(blank($tab)){
            // ta vindo do index, então redireciona para o /create = aba n°1

            request()->validate([
                'name' => ['required','string','max:255'],
                'subject' => ['required','string','max:40'],
                'email_list_id' => ['nullable'],
                'template_id' => ['nullable'],
            ]);

            $toRoute = route('campaigns.create',['tab'=> 'template']);
        }

        if($tab === 'template'){
            request()->validate([
                'body' => ['required','string'],
            ]);

            $toRoute = route('campaigns.create',['tab'=> 'schedule']);
        }

        $session = session()->get('campaigns::create',[]);
        foreach($session as $key => $value) {
            $newValue = data_get($map, $key);

            if (filled($newValue)) {
                $session[$key] = $newValue;
            }
        }


        if($tab === 'schedule'){
            request()->validate([
                'send_at' => ['required','date'],
            ]);

            $toRoute = route('campaigns.index');

        }

        session()->put('campaigns::create',$session);

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
