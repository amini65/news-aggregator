<?php

namespace App\Console\Commands;

use App\Services\Aggregator\Interfaces\SourceInterface;
use App\Services\Aggregator\NewsAggregator;
use App\Services\Aggregator\NewsAggregatorService;
use App\Services\Aggregator\NewsAPI\GuardianSource;
use Dotenv\Loader\Resolver;
use Illuminate\Console\Command;

class NewsAggregatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:aggregate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve the latest news from specific sources';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $newsSources=resolve(SourceInterface::class);

        foreach ($newsSources as $source) {
           $newsAggregator= NewsAggregator::getSource($source);
        }

        $newsAggregator->runSource();

    }
}
