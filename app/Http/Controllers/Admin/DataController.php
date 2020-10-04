<?php

namespace App\Http\Controllers\Admin;

use App\Authors;
use App\Books;
use App\CategoriesBook;
use App\CategoriesState;
use App\Http\Controllers\Controller;
use App\Members;
use App\Publisher;
use App\RecomendationBooks;
use App\Transactions;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function authors()
    {
        $authors = Authors::orderBy('author_name','ASC');

        return datatables()->of($authors)
                ->addColumn('action','admin.author.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function publishers()
    {
        $publishers = Publisher::orderBy('pub_name','ASC');

        return datatables()->of($publishers)
                ->addColumn('action','admin.publisher.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function categories_book()
    {
        $categories_books = CategoriesBook::orderBy('cbo_name','ASC');

        return datatables()->of($categories_books)
                ->addColumn('action','admin.categories_book.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function categories_state()
    {
        $categories_state = CategoriesState::orderBy('cst_name','ASC');

        return datatables()->of($categories_state)
                ->addColumn('action','admin.categories_state.action')
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
    }

    public function books()
    {
        $books = Books::select('id','title','qty','author_id','cover','slug')->with('author')->orderBy('title','ASC');
        // $books = Books::select('id','title','qty','author_id','cover','slug')->orderBy('title','ASC');

        return datatables()->of($books)
                ->addColumn('author', function(Books $model){
                    return $model->author['author_name'];
                })
                ->editColumn('cover', function(Books $model){
                    return '<img src="'.$model->getCover().'" height="180px" width="130px">';
                })
                ->addColumn('action','admin.book.action')
                ->addIndexColumn()
                ->rawColumns(['cover','action'])
                ->toJson();
    }

    public function members()
    {
        // $members = Members::select('id','member_code',DB::raw("CONCAT(first_name,' ',last_name) as full_name"),'slug','gender','cst_id')->with('category_state')->orderBy('member_code', 'ASC');
        $members = User::with(['members'])->where('id','!=',1)->orderBy('name','ASC');

        return datatables()->of($members)
            ->addColumn('gender', function(User $model){
                if($model->members->gender == 2){
                    return 'Perempuan' ;
                }
                
                return 'Laki-Laki';
                // return $model->members->gender;
            })
            ->addColumn('address',function(User $model){
                return $model->members->address;
            })
            // ->addColumn('birthDate',function(User $model){
            //     return $model->members->date_of_birth;
            // })
            // ->addColumn('phoneNumber',function(User $model){
            //     return $model->members->phone_number;
            // })
            ->addColumn('member_card',function(User $model){
                return $model->members->no_cst;
            })
            // ->addColumn('is_verified',function(User $model){
            //     if($model->members->is_verified == 0){
            //         return 'Belum';
            //     }
            //     else{
            //         return 'Sudah';
            //     }
            // })
            //if we use concat add filter column in below
            // ->filterColumn('full_name', function($query, $keyword) {
            //     $sql = "CONCAT(first_name,'-',last_name)  like ?";
            //     $query->whereRaw($sql, ["%{$keyword}%"]);
            // })
            // ->addColumn('category_state',function(Members $model){
            //     return $model->category_state->cst_name;
            //     })
            ->addColumn('action','admin.member.action')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function recomendationBooks ()
    {
        $recommendations = RecomendationBooks::orderBy('status','DESC');

        return datatables()->of($recommendations)
            ->addColumn('title', function(RecomendationBooks $model){
                return $model->book->title;
            })
            ->editColumn('cover', function(RecomendationBooks $model){
                return '<img src="'.$model->book->getCover().'" height="180px" width="130px">';
            })
            ->editColumn('status', function(RecomendationBooks $model){
                if($model->status == 1) {
                    return 'Aktif';
                }
                else {
                    return 'Tidak Aktif';
                }
            })
            ->addColumn('action','admin.recommendation.action')
            ->addIndexColumn()
            ->rawColumns(['cover','action'])
            ->toJson();
    }

    public function rejected()
    {
        $data = Transactions::where('state',3);

        return datatables()->of($data)
        ->addColumn('action','admin.transactions.action')
        ->addColumn('qty',function(Transactions $model){
            $qty = $model->transaction_details;
            return $qty->count();
        })
        ->addColumn('name', function(Transactions $model){
            $name = $model->users->name;
            return $name;
        })
        ->editColumn('created_at', function(Transactions $model){
            $date = Carbon::parse($model->created_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }

    public function borrow()
    {
        $data = Transactions::where('state',5);

        return datatables()->of($data)
        ->addColumn('action','admin.transactions.action')
        ->addColumn('qty',function(Transactions $model){
            $qty = $model->transaction_details;
            return $qty->count();
        })
        ->addColumn('name', function(Transactions $model){
            $name = $model->users->name;
            return $name;
        })
        ->addColumn('telat', function(Transactions $model){
            $check = $model->returned_at;
            if(Carbon::now() <= $check){
                return 'Belum';
            }
            else {
                return 'Sudah';
            }
        })
        ->editColumn('created_at', function(Transactions $model){
            $date = Carbon::parse($model->created_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->editColumn('borrowed_at', function(Transactions $model){
            $date = Carbon::parse($model->borrowed_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->editColumn('returned_at', function(Transactions $model){
            $date = Carbon::parse($model->returned_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }

    public function returned()
    {
        $data = Transactions::where('state',6);

        return datatables()->of($data)
        ->addColumn('name', function(Transactions $model){
            $name = $model->users->name;
            return $name;
        })
        ->addColumn('action','admin.transactions.action')
        ->editColumn('borrowed_at', function(Transactions $model){
            $date = Carbon::parse($model->borrowed_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->editColumn('returned_at', function(Transactions $model){
            $date = Carbon::parse($model->returned_at)->format('d-m-Y H:i:s');
            return $date;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
