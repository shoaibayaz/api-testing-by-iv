## Setup

- copy .env.example .env
- replace database collection and add BauBuddy credentials
 
```dotenv
BAU_BUDDY_LOGIN_URL=https://xxxxxx/login
BAU_BUDDY_BASE_URL=https://xxxx/v1
BAU_BUDDY_BASIC_AUTH_KEY=xxxxx
```
- run php artisan migrate
- run npm install
- run npm run build

