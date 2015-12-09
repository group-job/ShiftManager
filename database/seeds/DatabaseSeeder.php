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
         'name' => 'kimiy',
         'email' => '0',
         'password' => bcrypt('0'),
     ]);
     DB::table('users')->insert([
        'name' => 'ussy',
        'email' => '1',
        'password' => bcrypt('1'),
    ]);
    DB::table('users')->insert([
       'name' => 'masu',
       'email' => '2',
       'password' => bcrypt('2'),
   ]);
     DB::table('groups')->insert([
        'group_name' => 'きみやの管理グループ1',
        'manager_id' => '1',
    ]);
    DB::table('groups')->insert([
       'group_name' => 'うっしーの管理グループ1',
       'manager_id' => '2',
   ]);
   DB::table('groups')->insert([
      'group_name' => 'ますやまの管理グループ1',
      'manager_id' => '3',
  ]);

   DB::table('shifts')->insert([
      'user_id' => '1',
      'group_id' => '2',
      'date' => '2015-12-14',
      'start_time' => '10:30',
      'end_time' => '10:30',
      'status' => '1',
      'note' => 'きみやの仮グループシフト',
  ]);
  DB::table('shifts')->insert([
     'user_id' => '1',
     'group_id' => '2',
     'date' => '2015-12-15',
     'start_time' => '10:30',
     'end_time' => '10:30',
     'status' => '2',
     'note' => 'きみやの確定グループシフト',
 ]);
 DB::table('shifts')->insert([
    'user_id' => '1',
    'group_id' => '1',
    'date' => '2015-12-16',
    'start_time' => '10:30',
    'end_time' => '10:30',
    'status' => '2',
    'note' => 'きみやの個人シフト',
]);
   DB::table('shifts')->insert([
      'user_id' => '1',
      'group_id' => '2',
      'date' => '2015-12-16',
      'start_time' => '18:30',
      'end_time' => '18:30',
      'status' => '0',
      'note' => 'きみやのグループ申請シフト',
  ]);
  DB::table('shifts')->insert([
     'user_id' => '2',
     'group_id' => '1',
     'date' => '2015-12-11',
     'start_time' => '02:30',
     'end_time' => '05:30',
     'status' => '0',
     'note' => 'うっしーの申請グループシフト',
 ]);
 DB::table('shifts')->insert([
    'user_id' => '2',
    'group_id' => '1',
    'date' => '2015-12-11',
    'start_time' => '06:30',
    'end_time' => '09:30',
    'status' => '1',
    'note' => 'うっしーの仮グループシフト',
]);
DB::table('shifts')->insert([
   'user_id' => '2',
   'group_id' => '1',
   'date' => '2015-12-12',
   'start_time' => '09:30',
   'end_time' => '18:30',
   'status' => '2',
   'note' => 'うっしーの確定グループシフト',
]);
DB::table('shifts')->insert([
   'user_id' => '3',
   'group_id' => '1',
   'date' => '2015-12-11',
   'start_time' => '05:30',
   'end_time' => '08:30',
   'status' => '2',
   'note' => 'masuの確定グループシフト',
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
      'rate' => '32000',
      'start_date' => '2015-10-10',
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
    'group_id' => '3',
    'user_id' => '1',
    'start_date' => '2015-11-1',
    'end_date' => '',
]);
 DB::table('chats')->insert([
    'group_id' => '2',
    'user_id' => '1',
    'date' => '2015-11-11',
    'chat_category' => '0',
    'text' => 'きみやがうっしーのグループでチャット',
]);
DB::table('chats')->insert([
   'group_id' => '2',
   'user_id' => '1',
   'date' => '2015-11-11',
   'chat_category' => '1',
   'text' => 'きみやがうっしーのグループで連絡',
]);
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
