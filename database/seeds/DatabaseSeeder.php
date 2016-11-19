<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 500; $i++) { 
            DB::table('cake')->insert([
            'pid' => rand(1,2),
            'cate_id' => rand(1,10),
            'flag'=>['h,t','h','t'][rand(0,2)],
            'selled'=>rand(1,100),
            'weight_arr'=>serialize([0.5,1,1.5,2,2.5,3]),
            'title'=>"小切块-Pine Stone Cowboy 松仁淡奶",
            'description'=>'/离地二十多米的红松树尖，摇晃中取下的松塔/<br>
                            /秋天的风与阳光，让松塔果实金黄、饱满，泛出莹润的光泽。/<br>
                            /柔软的戚风白坯，和着松子慕斯夹心/<br>
                            /来自伊春的新鲜松仁覆满表面，咀嚼时除了松子独有的香气外还有一丝丝甜/<br>
                            /细筛过后的微苦可可粉，让这丝甜变得更加明显/<br>',
            'price'=>100.5,
            'size'=>"10cm*10cm",
            'person'=>"适合3人吃",
            'present'=>"赠送一双叉子",
            'time'=>10,
            'imgs'=>"1,2,3,4,5",
            'brand'=>"提拉米苏",
            'kouwei'=>'口味偏淡',
            'dangaocate'=>"小提拉米苏",
            'renqun'=>"适合小孩子吃",
            'jieri'=>"过生日吃吧",
            'tiandu'=>rand(1,5),
            'baoxian'=>"冷藏",
            'cailiao'=>"上好得小麦粉",
            'content'=>'
                    <p>Bailey’s Love Triangel／百利甜情人（含酒） Just Bailey‘s, light cream and you. The flavours may be velvetty subtle, but the chemistry is as electric as a first kiss.</p>
<p>/爱尔兰百利甜酒/新西兰奶油/云南玫瑰甘露/ </p>
<p>*本款产品为时令鲜果蛋糕，21cake依据季节，调整食材搭配，您会有体会。 </p>
<p style="MARGIN-TOP: 30px">百利甜的发祥地在英国。那里有一位著名的调酒师，调酒师的太太是一名出色的女性，他们彼此深爱着对方。有一天，很不幸，调酒师的太太死于一次意外。调酒师 从此悲伤，过着孤单的生活。直到一次出行的飞机上，调酒师遇到了一位像极了他前妻的空姐。他仿佛重获新生，一切生命的希望再一次点燃。那以后，调酒师疯狂 的追求着那位空姐。但是空姐并不能接受调酒师的爱，空姐对调酒师说，有时候人的心会被蒙住，你对你前妻的思念和对我的爱完全是不同的情感，就像是奶和威士 忌永远无法混在一起。调酒师听完空姐的话，默默的走开。他用了一年的时间，终于将奶和威士忌相溶，而且加了蜂密使味道也混为一体，并起了一个好听的名字 (Baileys Rock)，以此证明他对空姐的爱。当他知道空姐终于肯品尝这第一杯Baileys Rock时，忍不住在杯里加上了一滴眼泪。后来百利甜被空姐带上飞机，传播到世界各地，她对每一个喜欢喝百利甜的人说，“这杯酒，我等了一年”。 人们对百利甜的喜爱不只因为它纯美的爱情故事，它独特的芳香带给蛋糕无可比拟的甜蜜诱惑。</p>
<div style="BORDER-BOTTOM: #eee 1px solid; WIDTH: 100%; HEIGHT: 10px"></div>
<div style="MARGIN-TOP: 10px; WIDTH: 100%">小提示: 
<ol>
<li>1、蛋糕规格及免费配送餐具 ： 
<table style="WIDTH: 40%; MARGIN-LEFT: 19px">
<colgroup>
<col style="WIDTH: 35%">
<col style="WIDTH: 35%">
<col style="WIDTH: 30%"></colgroup>
<tbody>
<tr>
<td>1.0磅：约13×13(cm)</td>
<td>适合3-4人食用</td>
<td>免费配送5套餐具</td></tr>
<tr>
<td>2.0磅：约17×17(cm)</td>
<td>适合7-8人食用</td>
<td>免费配送10套餐具</td></tr>
<tr>
<td>3.0磅：约23×23(cm)</td>
<td>适合11-12人食用</td>
<td>免费配送15套餐具</td></tr>
<tr>
<td>5.0磅：约30×30(cm)</td>
<td>适合15-20人食用</td>
<td>免费配送20套餐具</td></tr></tbody></table>
<p style="MARGIN-LEFT: 19px">订购5磅及5磅以上规格的蛋糕，请与客服人员联系，订购电话：400 650 2121</p>
</li>
    <li>2、蛋糕在收到后2-3小时内食用为佳。 
</li>
    <li>3、如对上述食材有过敏经历者，请选择其它款蛋糕。 
</li>
    <li>4、玫瑰花瓣经过消毒处理，仅用作装饰，不建议食用。夹层玫瑰酱中少量块状物为可食玫瑰花瓣。</li>
    
</ol>
</div>                ',
            ]);
        }
    	
        // $this->call(UsersTableSeeder::class);
    }
}
