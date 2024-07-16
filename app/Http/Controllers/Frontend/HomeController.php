<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Notifications\TicketCreatedNotification;
use App\Http\Requests\DestekRequest;
use App\Http\Requests\TicketMessageRequest;
use App\Models\Category;
use App\Models\Destek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Index()
    {
        $user = Auth::user();
        $all = $user->desteklerim->count();
        $active = $user->desteklerim->where('status','Açık')->count();
        $hanger = $user->desteklerim->where('status','Askıda')->count();
        $terminated = $user->desteklerim->where('status','Kapalı')->count();

        return view('frontend.pages.index',compact('user','all','active','hanger','terminated'));
    }

    public function destekShow()
    {
        $user = Auth::user();
        $categories = Category::whereNull('cat_ust')->with('subcategory')->get();
        Kategorilerim();

        return view('frontend.pages.destekcreate', compact('categories', 'user'));
    }

    public function destekCreate(DestekRequest $request)
    {
        $user = Auth::user();

        $destek = $user->desteklerim()->create([
            'category_id' => $request->category_id,
            'level' => $request->level,
            'status' => $request->status,
            'subject' => $request->subject,
            'description' => $request->description,
            'file' => $request->file,
        ]);
        $user->notify(new TicketCreatedNotification($destek->id));

        return redirect()->route('destek.show')->withSuccess('Destek Talebiniz Başarılı Bir Şekilde Oluşturuldu');
    }

    public function destekListActive()
    {
        $support = Destek::where('user_id', Auth::id())->where('status', 'Açık')->with('user', 'category')->latest()->get();

        return view('frontend.pages.desteklistactive', compact('support'));
    }

    public function destekListHanger()
    {
        $support = Destek::where('user_id',Auth::id())->where('status', 'Askıda')->with('user', 'category')->latest()->get();

        return view('frontend.pages.desteklisthanger', compact('support'));
    }

    public function destekListTerminated()
    {
        $support = Destek::where('user_id', Auth::id())->where('status', 'Kapalı')->with('user', 'category')->latest()->get();

        return view('frontend.pages.desteklistterminated', compact('support'));
    }

    public function destekAbout($id)
    {
        $destek = Destek::findOrFail($id);
        if (Auth::id() == $destek->user_id) {
            $support = Destek::where('id', $id)->first();
            $message = $support->mesajlar;

            return view('frontend.pages.destekabout', compact('support', 'message'));
        }
        return redirect('/');
    }

    public function destekDelete($id)
    {
        $destek = Destek::findOrFail($id);

        if (Auth::id() == $destek->user_id) {

            $destek = Destek::where('id', $id);
            $destek->delete();

            return redirect()->back();
        }
        return redirect('/');
    }

    public function destekUpdateShow($id)
    {
        $destek = Destek::findOrFail($id);
        if (Auth::id() == $destek->user_id) {
            $support = Destek::where('id', $id)->first();
            $user = Auth::user();
            $categories = Category::whereNull('cat_ust')->with('subcategory')->get();
            Kategorilerim();

            return view('frontend.pages.destekupdate', compact('support', 'categories', 'user'));
        }
        return redirect('/');
    }

    public function destekUpdate(Request $request, $id)
    {
        $destek = Destek::findOrFail($id);
        if (Auth::id() == $destek->user_id) {
            $support = Destek::findOrFail($id);

            $support->category_id = $request->category_id;
            $support->level = $request->level;
            $support->status = $request->status;
            $support->file = $request->file;
            $support->subject = $request->subject;
            $support->description = $request->description;
            $support->save();

            return redirect()->route('destek.list.active');
        }
        return redirect('/');
    }

    public function destekMessageCreate(TicketMessageRequest $request, Destek $destek)
    {
        $destek->load(['user']);
        if (Auth::id() == $destek->user->id) {
            $destek->mesajlar()->create([
                'user_id' => Auth::id(),
                'message' => $request->message,
            ]);
            return redirect()->back();
        }
        return redirect('/');
    }

    public function destekStatusTerminated(Destek $destek)
    {
        $destek->load(['user']);
        if (Auth::id() == $destek->user->id) {
            $destek->status = 'Kapalı';
            $destek->save();

            return redirect()->route('destek.list.son');
        }
        return redirect('/');
    }
}
