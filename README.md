## Installation
Make sure you have environment setup properly. You will need MySQL, PHP8.1, Node.js and composer.

### Setup Laravel + API
1. Clone project using GIT
2. Copy `.env.example` into `.env` and configure DB credentials
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan serve`
6. Run migrations `php artisan migrate --seed`
7.Start local server by executing `php artisan serve`
8. Open new terminal and navigate to the project root directory
9. Run `npm install`
10. Run `npm run dev` to start vite server for Laravel frontend



### Install Vue.js Admin Panel
1. Navigate to `admin` folder
2. Run `npm install`
3. Copy `backend/.env.example` into `backend/.env`
4. Make sure `VITE_API_BASE_URL` key in `backend/.env` is set to your Laravel API host (Default: http://localhost:8000)
5. Run `npm run dev`
6. If you seeded a database then open Vue.js Admin Panel in browser and login with

    ```
    superadmin@gmail.com
    Test1234
    ```

### Stripe payment checkout
1. Enter your email from
2. Card number `4242 4242 4242 4242`
3. Valid future date `12/34`
4. CVC any trhee-digit CVC, example `567`
5. Enter any Country
    
