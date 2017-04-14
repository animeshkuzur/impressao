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
        $this->call(Binding::class);
        $this->call(Discount::class);
        $this->call(PaymentMode::class);
        $this->call(PageSize::class);
        $this->call(PageType::class);
        $this->call(PrintSide::class);
        $this->call(PrintType::class);
        $this->call(Price::class);
    }
}
