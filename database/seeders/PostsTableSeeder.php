<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('posts')->delete();

        DB::table('posts')->insert(array(
            0 =>
            array(
                'body' => 'به گزارش خبرآنلاین،‌ آزمون گروه‌های آزمایشی علوم ریاضی و فنی و علوم انسانی صبح روز پنجشنبه ۲۱ تیر و آزمون گروه‌های آزمایشی هنر و زبان‌های خارجی بعدازظهر روز پنجشنبه ۲۱ تیر ماه و آزمون گروه آزمایشی علوم تجربی صبح روز جمعه ۲۲ تیر ماه برگزار می‌شود.

ایسنا نوشت: کارت شرکت در آزمون همه داوطلبان به‌همراه راهنمای شرکت در آزمون از روز یکشنبه ۱۷ تیر ماه تا روز چهارشنبه به تاریخ ۲۰ تیر ماه در سامانه جامع آزمون سراسری برای مشاهده و پرینت فعال خواهد شد.

داوطلبانی که در ۲ گروه آزمایشی شامل یک گروه آزمایشی اصلی (علوم ریاضی و فنی، علوم تجربی و علوم انسانی) به همراه یکی از گروه‌های آزمایشی هنر یا زبان‌های خارجی متقاضی شده‌اند دارای ۲ کارت هستند.

۴۷۴۷

برای دسترسی سریع به تازه‌ترین اخبار و تحلیل‌ رویدادهای ایران و جهان اپلیکیشن خبرآنلاین را نصب کنید.',
                'category_id' => 4,
                'created_at' => '2024-07-04 21:14:16',
                'id' => 4,
                'image' => 'images/pqEYuDnwwB3uoMOVxbITLoVIKYeWTPr7vPMx2H3r.jpg',
                'published' => 1,
                'slug' => 'زمان برگزاری آزمون نوبت دوم کنکور ۱۴۰۳ اعلام شد',
                'summary' => 'نوبت دوم آزمون سراسری سال ۱۴۰۳ روزهای پنجشنبه و جمعه ۲۱ و ۲۲ تیر در ۴۰۸ شهر کشور برگزار می‌شود.',
                'title' => 'زمان برگزاری آزمون نوبت دوم کنکور ۱۴۰۳ اعلام شد',
                'updated_at' => '2024-07-05 13:07:41',
                'user_id' => 6,
                'views' => 0,
            ),
        ));
    }
}
