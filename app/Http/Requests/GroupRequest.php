<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Group;

class GroupRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $groupId = $this->route('groupId');
        // 指定されたグループが存在しない場合、ここで弾いいて403エラー
        return (Group::find($groupId)!==null);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

}
