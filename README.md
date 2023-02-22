<p align="center"><img src="https://codeberg.org/lainforo/oldversion/media/branch/master/branding/full_logo.png" height=250></p>

Hey! Additional information can be found in <a href="https://github.com/lainforo/docs">our Obsidian vault.</a>

# Installing LainForo
The installation process for LainForo is simple, thanks to the Laravel framework and built-in tools like `php artisan`. For this little tutorial, I'm going to use `php artisan serve` to run our site instead of setting up a webserver. I recommend you run this on a webserver in production, but for development you should use `artisan`.

**Note: LainForo has been tested on Arch Linux and Debian 11.**

## Setting up the database
By default, LainForo is configured to use an SQLite database. This makes it incredibly portable and fast, as it doesn't have to connect to an SQL server (which, if external, can add response time).

If you're on Linux, you can run `touch database/database.sqlite` in the root of LainForo. On other systems, you should be able to get away with just creating a blank file at that path.

Next, you need to run `php artisan migrate`. This will create the database tables and get everything ready for use. After that, run `composer install` (this assumes you have Composer installed) to install all of the required dependencies to run LainForo, like the Laravel framework backend.

This should be all you need to do for a minimal installation of LainForo.

## Creating boards
I haven't added a board creation system to LainForo yet, but I plan to add one very soon to the admin control page. For now, you must interact with the `boards` table in your database directly. If you're using SQLite, run `sqlite database/database.sqlite` in the root of LainForo. Normal SQL syntax works in this interface.

## Managing LainForo
Now that we have a board or two, you should edit the `.env` file in the root of LainForo. **It may appear hidden on some systems.** There are some LainForo-specific settings at the top of the file. Each variable name should be easily understandable. Please change `LF_PASSWORD` to a secure password, as it'll be used to login to the admin page.

On the homepage of LainForo, there will be a button above the boardlist which says `[admin]`. Click that, and it'll send you to a login page which prompts you for the `LF_PASSWORD`. Logging into this will now allow you to remove threads and replies by visiting them as normal. Buttons will appear on the posts like `[delete]`, `[feature]` and `[unfeature]`. Featuring a thread will put it on the front page of your site. This is ideal for announcements and important posts.

I'm still working on the documentation for LainForo, so these directions may deprecate at any time.