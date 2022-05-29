# CRM Task Manager
#### laravel pet-project
[![Actions Status](https://github.com/Rustam-Amirov/php-project-lvl4/workflows/hexlet-check/badge.svg)](https://github.com/Rustam-Amirov/php-project-lvl4/actions)
[![App-CI](https://github.com/Rustam-Amirov/php-project-lvl4/workflows/CI/badge.svg)](https://github.com/github/docs/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/3ff6ea5498614343e9c1/maintainability)](https://codeclimate.com/github/Rustam-Amirov/php-project-lvl4/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/3ff6ea5498614343e9c1/test_coverage)](https://codeclimate.com/github/Rustam-Amirov/php-project-lvl4/test_coverage)

[<img src="pictures/main.png" width="750"/>](image.png)

## For instualaion:
```
 git clone https://github.com/Rustam-Amirov/php-project-lvl4
 cd php-project-lvl4
 make install
 make setup
 make migrate
 make start
 ```
# It is a task manager with authorization and authentication

[<img src="pictures/logup.png" width="550"/>](image.png)
[<img src="pictures/login.png" width="587"/>](image.png)

### There is support for Russian and English


## Task creation form:
[<img src="pictures/create_task.png" width="1000"/>](image.png)
[<img src="pictures/task_list.png" width="1000"/>](image.png)
### Unable to create task, status or label if user is not authorized
# Route List
```
 GET|HEAD        / ............................................................................. main
  POST            _ignition/execute-solution ignition.executeSolution › Spatie\LaravelIgnition › Exec…
  GET|HEAD        _ignition/health-check ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckC…
  POST            _ignition/update-config ignition.updateConfig › Spatie\LaravelIgnition › UpdateConf…
  GET|HEAD        api/user ...........................................................................
  GET|HEAD        confirm-password ........ password.confirm › Auth\ConfirmablePasswordController@show
  POST            confirm-password .......................... Auth\ConfirmablePasswordController@store
  POST            email/verification-notification verification.send › Auth\EmailVerificationNotificat…
  GET|HEAD        forgot-password ......... password.request › Auth\PasswordResetLinkController@create
  POST            forgot-password ............ password.email › Auth\PasswordResetLinkController@store
  GET|HEAD        labels ........................................ labels.index › LabelController@index
  POST            labels ........................................ labels.store › LabelController@store
  GET|HEAD        labels/create ............................... labels.create › LabelController@create
  GET|HEAD        labels/{label} .................................. labels.show › LabelController@show
  PUT|PATCH       labels/{label} .............................. labels.update › LabelController@update
  DELETE          labels/{label} ............................ labels.destroy › LabelController@destroy
  GET|HEAD        labels/{label}/edit ............................. labels.edit › LabelController@edit
  GET|HEAD        login ........................... login › Auth\AuthenticatedSessionController@create
  POST            login .................................... Auth\AuthenticatedSessionController@store
  POST            logout ........................ logout › Auth\AuthenticatedSessionController@destroy
  GET|HEAD        register ........................... register › Auth\RegisteredUserController@create
  POST            register ....................................... Auth\RegisteredUserController@store
  GET|HEAD        reset-password .................. password.reset › Auth\NewPasswordController@create
  POST            reset-password .................. password.update › Auth\NewPasswordController@store
  GET|HEAD        sanctum/csrf-cookie .................... Laravel\Sanctum › CsrfCookieController@show
  GET|HEAD        task_statuses ..................... task_statuses.index › TaskStatusController@index
  POST            task_statuses ..................... task_statuses.store › TaskStatusController@store
  GET|HEAD        task_statuses/create ............ task_statuses.create › TaskStatusController@create
  GET|HEAD        task_statuses/{task_status} ......... task_statuses.show › TaskStatusController@show
  PUT|PATCH       task_statuses/{task_status} ..... task_statuses.update › TaskStatusController@update
  DELETE          task_statuses/{task_status} ... task_statuses.destroy › TaskStatusController@destroy
  GET|HEAD        task_statuses/{task_status}/edit .... task_statuses.edit › TaskStatusController@edit
  GET|HEAD        tasks ........................................... tasks.index › TaskController@index
  POST            tasks ........................................... tasks.store › TaskController@store
  GET|HEAD        tasks/create .................................. tasks.create › TaskController@create
  GET|HEAD        tasks/{task} ...................................... tasks.show › TaskController@show
  PUT|PATCH       tasks/{task} .................................. tasks.update › TaskController@update
  DELETE          tasks/{task} ................................ tasks.destroy › TaskController@destroy
  GET|HEAD        tasks/{task}/edit ................................. tasks.edit › TaskController@edit
  GET|HEAD        verify-email . verification.notice › Auth\EmailVerificationPromptController@__invoke
  GET|HEAD        verify-email/{id}/{hash} . verification.verify › Auth\VerifyEmailController@__invoke
```
## List statuses:
[<img src="pictures/statuses.png" width="1000"/>](image.png)
