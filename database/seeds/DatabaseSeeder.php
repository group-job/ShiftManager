<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *-------------------------------------------------------------------------\
     *めんどくさいのでファイル分割は行わない
     *-------------------------------------------------------------------------
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
         'name' => 'やすなが',
         'email' => '0',
         'password' => bcrypt('0'),
     ]);
     DB::table('users')->insert([
        'name' => 'きみや',
        'email' => '1',
        'password' => bcrypt('1'),
    ]);
    DB::table('users')->insert([
       'name' => 'ますやま',
       'email' => '2',
       'password' => bcrypt('2'),
   ]);
   DB::table('users')->insert([
      'name' => 'ながとも',
      'email' => '3',
      'password' => bcrypt('3'),
  ]);
  DB::table('users')->insert([
     'name' => 'うっしー',
     'email' => '4',
     'password' => bcrypt('4'),
 ]);
 DB::table('users')->insert([
    'name' => 'まえだ',
    'email' => '5',
    'password' => bcrypt('5'),
]);
     DB::table('groups')->insert([
        'group_name' => 'ラウンドツー',
        'manager_id' => '1',
    ]);
    DB::table('groups')->insert([
     'group_name' => 'きみや商事',
       'manager_id' => '2',
   ]);
   DB::table('groups')->insert([
      'group_name' => 'マクド',
      'manager_id' => '3',
  ]);
//  DB::table('shifts')->insert([
//     'user_id' => '1',
//     'group_id' => '1',
//     'date' => '2015-12-19',
//     'start_time' => '10:30',
//     'end_time' => '10:30',
//     'status' => '2',
//     'note' => 'やすながの個人シフト',
// ]);
  //  DB::table('shifts')->insert([
  //     'user_id' => '1',
  //     'group_id' => '2',
  //     'date' => '2015-12-17',
  //     'start_time' => '9:00',
  //     'end_time' => '18:30',
  //     'status' => '0',
  //     'note' => 'やすながの申請シフト',
  // ]);
 DB::table('shifts')->insert([
    'user_id' => '1',
    'group_id' => '2',
    'date' => '2015-12-17',
    'start_time' => '06:30',
    'end_time' => '08:30',
    'status' => '1',
    'note' => 'やすながの仮グループシフト',
]);
// DB::table('shifts')->insert([
//    'user_id' => '1',
//    'group_id' => '1',
//    'date' => '2015-12-17',
//    'start_time' => '09:30',
//    'end_time' => '13:30',
//    'status' => '2',
//    'note' => 'やすながの確定シフト',
// ]);
DB::table('shifts')->insert([
   'user_id' => '1',
   'group_id' => '2',
   'date' => '2015-12-17',
   'start_time' => '09:30',
   'end_time' => '13:30',
   'status' => '2',
   'note' => 'やすながの確定シフト',
]);
DB::table('shifts')->insert([
   'user_id' => '3',
   'group_id' => '2',
   'date' => '2015-12-17',
   'start_time' => '05:30',
   'end_time' => '08:30',
   'status' => '2',
   'note' => 'ますやまの確定グループシフト',
]);
DB::table('shifts')->insert([
   'user_id' => '3',
   'group_id' => '2',
   'date' => '2015-12-17',
   'start_time' => '02:30',
   'end_time' => '05:00',
   'status' => '1',
   'note' => 'ますやまの仮グループシフト',
]);
   DB::table('rates')->insert([
      'user_id' => '1',
      'group_id' => '1',
      'rate' => '32',
      'start_date' => '2015-10-10',
      'end_date' => '',
      'rate_category' => '0',
  ]);
  DB::table('rates')->insert([
      'user_id' => '1',
      'group_id' => '2',
      'rate' => '3200',
      'start_date' => '2015-10-10',
      'end_date' => '',
      'rate_category' => '0',
  ]);
  DB::table('rates')->insert([
      'user_id' => '1',
      'group_id' => '3',
      'rate' => '1600',
      'start_date' => '2015-11-20',
      'end_date' => '',
      'rate_category' => '0',
  ]);
  DB::table('employments')->insert([
     'group_id' => '2',
     'user_id' => '1',
     'start_date' => '2015-10-1',
     'end_date' => '',
 ]);
 DB::table('employments')->insert([
    'group_id' => '2',
    'user_id' => '3',
    'start_date' => '2015-11-1',
    'end_date' => '',
]);
DB::table('employments')->insert([
   'group_id' => '2',
   'user_id' => '4',
   'start_date' => '2015-11-1',
   'end_date' => '',
]);
DB::table('employments')->insert([
   'group_id' => '2',
   'user_id' => '6',
   'start_date' => '2015-11-1',
   'end_date' => '',
]);
 DB::table('chats')->insert([
    'group_id' => '2',
    'user_id' => '1',
    'date' => '2015-12-11 10:00',
    'chat_category' => '0',
    'text' => '明日のシフトだれか代わってください',
]);
DB::table('chats')->insert([
   'group_id' => '2',
   'user_id' => '3',
   'date' => '2015-12-11 10:30',
   'chat_category' => '0',
   'text' => 'むり。',
]);
// DB::table('chats')->insert([
//    'group_id' => '2',
//    'user_id' => '1',
//    'date' => '2015-12-11',
//    'chat_category' => '1',
//    'text' => 'オーナーがクビになりました',
// ]);
DB::table('confirmations')->insert([ //うっしーがきみ屋の連絡を確認
   'user_id' => '2',
   'chat_id' => '2',
]);


        // Model::unguard();
        //
        // // $this->call(UserTableSeeder::class);
        //
        // Model::reguard();
    }
}
