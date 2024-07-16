<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destek;
use App\Models\Message;
use App\Models\User;
use App\Notifications\SystemMessageCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function admin()
    {
        if (Auth::user()->is_admin == 1) {
            $support = Destek::all();
            $all = $support->count();
            $active = $support->where('status','Açık')->count();
            $hanger = $support->where('status','Askıda')->count();
            $terminated = $support->where('status','Kapalı')->count();

            return view('backend.pages.admin',compact('all','active','hanger','terminated'));
        }
        return redirect('/');
    }

    public function destekActive()
    {
        if (Auth::user()->is_admin == 1) {
            $supports = Destek::where('status', 'Açık')->latest()->get();

            return view('backend.pages.desteklistactive', compact('supports'));
        }
        return redirect('/');
    }

    public function destekTerminated()
    {
        if (Auth::user()->is_admin == 1) {

            $supports = Destek::where('status', 'Kapalı')->latest()->get();

            return view('backend.pages.desteklistterminated', compact('supports'));
        }
        return redirect('/');
    }

    public function destekHanger()
    {
        if (Auth::user()->is_admin == 1) {

            $supports = Destek::where('status', 'Askıda')->latest()->get();

            return view('backend.pages.desteklisthanger', compact('supports'));
        }
        return redirect('/');
    }

    public function destekDelete($id)
    {

        if (Auth::user()->is_admin == 1) {
            $support = Destek::where('id', $id)->first();
            $support->delete();
            return redirect()->route('admin.dashboard');
        }

        return redirect('/');
    }

    public function destekUpdateShow($id)
    {
        if (Auth::user()->is_admin == 1) {
            $support = Destek::where('id', $id)->first();
            $user = Auth::user();
            $categories = Category::whereNull('cat_ust')->with('subcategory')->get();
            Kategorilerim();

            return view('backend.pages.destekupdate', compact('support', 'categories', 'user'));
        }
        return redirect('/');
    }

    public function destekUpdate(Request $request, $id)
    {
        if (Auth::user()->is_admin == 1) {
            $support = Destek::findOrFail($id);

            $support->category_id = $request->category_id;
            $support->level = $request->level;
            $support->status = $request->status;
            $support->subject = $request->subject;
            $support->description = $request->description;
            $support->file = $request->file;
            $support->save();

            return redirect()->route('admin.destek.active')->withSuccess('Güncelleme İşlemi Başarılı.');
        }
        return redirect('/');
    }

    public function destekAbout($id)
    {
        if (Auth::user()->is_admin == 1) {
            $support = Destek::where('id', $id)->first();
            $message = $support->mesajlar;

            return view('backend.pages.destekabout', compact('support', 'message'));
        }
        return redirect('/');
    }

    public function destekAboutMessage(Request $request, Destek $destek)
    {
        if (Auth::user()->is_admin == 1) {
            $destek->load(['user']);

            $destek->mesajlar()->create([
                'user_id' => Auth::id(),
                'message' => $request->message,
            ]);

            $destek->user->notify(new SystemMessageCreatedNotification($destek->id));

            return redirect()->route('admin.destek.active')->withSuccess('Mesajınız Başarılı Bir Şekilde Gönderilmiştir.');
        }
        return redirect('/');
    }

    public function destekstatus(Destek $destek)
    {
        if (Auth::user()->is_admin == 1) {
            $destek->status = 'Kapalı';
            $destek->save();

            return redirect()->route('admin.destek.active');
        }
        return redirect('/');
    }
}
