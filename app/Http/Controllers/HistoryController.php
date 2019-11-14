<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(){



        $paginates = BufferPosting::paginate(15);;

//        return $datas[]->groupInfo->name;

        return view('history', compact('paginates'));
    }


    public function searchistory(Request $request){
        if ($request->ajax()){


            $output="";
            $searchResults = DB::table('buffer_postings')
                ->join('social_post_groups','social_post_groups.id','=','buffer_postings.group_id')
                ->select('buffer_postings.*','social_post_groups.*')
                ->where('name','like','%'.$request->search.'%')
                ->get();


            if ($searchResults){
                foreach ($searchResults as $key=>$searchResult){
                    $output.= '<tr>'.
                        '<th scope="row">'. ++$key .'</th>'.
                        '<td>'. $searchResult->name .'</td>'.
                        '<td>'. '---' .'</td>'.
                        '<td>'. $searchResult->post_text .'</td>'.
                        '<td>'. $searchResult->sent_at .'</td>'.
                        '</tr>';
                }


                return Response($output);
                '<span>'. $searchResult->links() .'</span>';

            }
        }
    }
}
