<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\UserAppoinments;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class ControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // TODO Дополнительная настройка
    }

    public function test_getUser_returns_user_data()
    {
        // Создаем тестового пользователя
        $user = User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'image' => 'path/to/image.jpg',
        ]);

        // Авторизуем пользователя
        Auth::login($user);

        // Выполняем запрос к методу getUser
        $response = $this->getJson('/get-user'); // Предполагаем, что маршрут настроен на getUser

        // Проверяем ответ
        $response->assertStatus(200)
            ->assertJson([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone' => '1234567890',
                'email' => 'john@example.com',
                'image' => 'path/to/image.jpg',
            ]);
    }

    public function test_getUser_returns_null_when_not_authenticated()
    {
        // Выполняем запрос к методу getUser без авторизации
        $response = $this->getJson('/get-user'); // Предполагаем, что маршрут настроен на getUser

        // Проверяем ответ
        $response->assertStatus(200)
            ->assertJson(null);
    }

    public function test_get_appointments_returns_appointments_for_authenticated_user()
    {
        // Создаем тестового пользователя
        $user = User::factory()->create();

        // Создаем тестовую услугу
        $service = Service::factory()->create([
            'name' => 'Test Service',
        ]);

        // Создаем тестовую запись
        $appointment = UserAppoinments::factory()->create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'appointment_date' => now()->addDay(),
        ]);

        // Авторизуем пользователя
        Auth::login($user);

        // Выполняем запрос к методу get_appointments
        $response = $this->getJson('/get-appointments'); // Предполагаем, что маршрут настроен на get_appointments

        // Проверяем ответ
        $response->assertStatus(200)
            ->assertJsonStructure([
                'appointments' => [
                    '*' => [
                        'id',
                        'user_id',
                        'service_id',
                        'appointment_date',
                        'service_name',
                    ],
                ],
            ])
            ->assertJson([
                'appointments' => [
                    [
                        'id' => $appointment->id,
                        'user_id' => $user->id,
                        'service_id' => $service->id,
                        'appointment_date' => $appointment->appointment_date->toISOString(),
                        'service_name' => 'Test Service',
                    ],
                ],
            ]);
    }

    public function test_get_appointments_returns_empty_array_when_not_authenticated()
    {
        // Выполняем запрос к методу get_appointments без авторизации
        $response = $this->getJson('/get-appointments'); // Предполагаем, что маршрут настроен на get_appointments

        // Проверяем ответ
        $response->assertStatus(200)
            ->assertJson([
                'appointments' => [],
            ]);
    }
}
