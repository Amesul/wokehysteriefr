<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Episode;
use App\Models\Post;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        User::factory()->create([
            'display_name' => 'Amesul',
            'username' => 'amesul',
            'email' => 'samuelstroesser@icloud.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'admin' => true,
            'writer' => true,
            'job' => 'Créateurice',
            'team' => 'creators',
        ]);
        Post::factory(35)->create();
        Tag::factory(12)->create();
        Episode::factory(11)->create();
//        Question::factory()->create([
//            'question' => 'Comment cette émission a-t-elle été crée ?',
//            'answer' => `<p>Lors du marathon caritatif <a href="https://ettacause.fr/" class="underline hover:bg-blue-violet dark:hover:text-white" target="_blank">Et Ta Cause 2022</a>, une table ronde sur les transidentités avait été organisé par Amesul. Ne devant être qu'une simple discusssion, la diffusion a rencontré un franc succès et il aurait été dommage de s'arrêter là. Et c'est ainsi que quelques mois plus tard, Desentredeux et Amesul ont commencé à travailler sur un talk-show réunissant le militantisme, les copaines de Twitch et une bonne dose de rigolade.</p>                <p>En janvier 2023, le premier pilote est produit, réunissant toute l'équipe. Après un deuxième épisode, la production est mise en pause jusque septembre 2023 afin de retravailler l'émission en profondeur et proposer un contenu toujours de meilleure qualité.</p>`,
//        ]);
        Question::factory(6)->create();
    }
}
