Hi there,

This is my implementation of a simple User API built in Laravel 5.6.


The User API works with routes.

- GET: /api/users - Get User
- POST: /api/users - Create User
- POST: /api/users/{user_id}?_method=PUT - Replace User
- POST: /api/users/{user_id}?_method=PATCH - Update User
- DELETE /api/users/{user_id} - Delete User

Note: These headers need to be set.
- Accept: application/json
- Content-Type: application/json

Note: If testing the API Live please seed the DB.


I added unit tests for functionality that I created apart from the Laravel Framework.
Besides that Controllers, Models, etc.. would be better off as functional tests.
Also, I did not unit test basic getters and setters it seems like overkill to me.