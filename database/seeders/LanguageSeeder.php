<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $languages = [ 'Afrikaans','Albanian', 'Amharic','Arabic','Armenian','Assamese','Azerbaijani',
            'Basque','Belarusian','Bengali','Bosnian','Bulgarian','Burmese','Catalan','Cebuano',
            'Chinese (Mandarin)','Chinese (Cantonese)','Croatian','Czech','Danish','Dari','Dutch',
            'English','Estonian','Fijian','Filipino (Tagalog)','Finnish','French','Georgian','German',
            'Greek','Gujarati','Haitian Creole','Hausa','Hebrew','Hindi','Hmong','Hungarian','Icelandic',
            'Igbo','Ilocano','Indonesian','Irish','Italian','Japanese','Javanese','Kannada','Kazakh',
            'Khmer','Kinyarwanda','Korean','Kurdish (Kurmanji)','Kurdish (Sorani)','Kyrgyz','Lao','Latvian',
            'Lithuanian','Luxembourgish','Macedonian','Malagasy','Malay','Malayalam','Maltese','Maori',
            'Marathi','Mongolian','Nepali','Norwegian','Odia','Pashto','Persian (Farsi)','Polish',
            'Portuguese','Punjabi','Quechua','Romanian','Russian','Samoan','Sanskrit','Serbian','Shona',
            'Sindhi','Sinhala','Slovak','Slovenian','Somali','Spanish','Sundanese','Swahili','Swedish',
            'Tahitian','Tajik','Tamil','Tatar','Telugu','Thai','Tibetan','Tigrinya','Tongan','Tsonga',
            'Turkish','Turkmen','Ukrainian','Urdu','Uyghur','Uzbek','Vietnamese','Welsh','Wolof','Xhosa',
            'Yiddish','Yoruba','Zulu'
        ];

        $insertData = [];

        foreach ($languages as $lang)
        {
            $insertData[] = [
                'language'  => $lang
            ];
        }

        DB::table('languages')->insert($insertData);
    }
}
