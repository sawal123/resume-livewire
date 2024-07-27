<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tools')->insert(
            [
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Arduino',
                  'category'=>'programmer',
                  'icon' => 'arduino.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'C',
                  'category'=>'programmer',
                  'icon' => 'c.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Javascript',
                  'category'=>'programmer',
                  'icon' => 'javascript.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'HTML',
                  'category'=>'programmer',
                  'icon' => 'html.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Laravel',
                  'category'=>'programmer',
                  'icon' => 'laravel.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Mysql',
                  'category'=>'programmer',
                  'icon' => 'mysql.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'PHP',
                  'category'=>'programmer',
                  'icon' => 'php.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Wordpress',
                  'category'=>'programmer',
                  'icon' => 'wordpress.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'CSS',
                  'category'=>'programmer',
                  'icon' => 'css.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Bootstrap',
                  'category'=>'programmer',
                  'icon' => 'bootstrap.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Tailwinds',
                  'category'=>'programmer',
                  'icon' => 'tailwinds.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Blender',
                  'category'=>'mulitmedia',
                  'icon' => 'blender.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Photoshop',
                  'category'=>'mulitmedia',
                  'icon' => 'photoshop.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Adobe Premiere Pro',
                  'category'=>'mulitmedia',
                  'icon' => 'adobe premiere pro.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'After Effect',
                  'category'=>'mulitmedia',
                  'icon' => 'after effect.svg'
              ],
              [
                  'uuid'=>Str::uuid(),
                  'name' => 'Canvaa',
                  'category'=>'mulitmedia',
                  'icon' => 'canva.svg'
              ],
            ]
          );
  
    }
}
