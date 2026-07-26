<?php

use App\Jobs\SendEmailCampaignJob;
use App\Jobs\SendEmailsCampaignJob;
use App\Models\Campaign;
use App\Models\EmailList;
use App\Models\Subscriber;
use App\Models\Template;
use Illuminate\Support\Facades\Bus;

it('making sure that a job is created for each one of the subscribers', function() {
    // Bus::fake([SendEmailCampaignJob::class]);
    Bus::fake();
    
    $template = Template::factory()->create();

    $emailList = EmailList::factory()->has(Subscriber::factory()->count(3))->create();

    $campaign = Campaign::factory()->for($emailList)->create();

    // SendEmailsCampaignJob::dispatch($campaign);
    (new SendEmailsCampaignJob($campaign))->handle();

    Bus::assertDispatchedTimes(SendEmailCampaignJob::class, 3);
    Bus::assertDispatched(
        SendEmailCampaignJob::class,
        function(SendEmailCampaignJob $job) use ($campaign) {
            expect($job->campaign->id)->toBe($campaign->id);

            return true;
        }
    );
});

test('when a campaign is set to send now an email should be send right a way', function() {})->todo();
test('when a campaign is set to later the email should be schedule to be sent in the given date', function() {})->todo();
test('making that the job is sending an email', function() {})->todo();