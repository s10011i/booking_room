<div class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


{{Route('login')}}

<form action="/rooms/{{$room->id}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
              <input type="hidden" class="form-control" name="status" onsubmit="this.form.submit()" value="1">
            </div>
          </form>

<form action="/rooms/{{$room->id}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
               <input type="hidden" name="status" onsubmit="this.form.submit()" {{$room->status? 'checked' : ''}} value="{{$room->status? '1' : ''}}">
              
            </div>

          </form>

$users = Users::where('status_id', 'active')
           ->where( 'created_at', '>', Carbon::now()->subDays(10))
           ->get();


use Carbon\Carbon;

printf("Right now is %s", Carbon::now()->toDateTimeString());
printf("Right now in Vancouver is %s", Carbon::now('America/Vancouver'));  //implicit __toString()
$tomorrow = Carbon::now()->addDay();
$lastWeek = Carbon::now()->subWeek();
$nextSummerOlympics = Carbon::createFromDate(2016)->addYears(4);

$officialDate = Carbon::now()->toRfc2822String();

$howOldAmI = Carbon::createFromDate(1975, 5, 21)->age;

$noonTodayLondonTime = Carbon::createFromTime(12, 0, 0, 'Europe/London');

$internetWillBlowUpOn = Carbon::create(2038, 01, 19, 3, 14, 7, 'GMT');

// Don't really want this to happen so mock now
Carbon::setTestNow(Carbon::createFromDate(2000, 1, 1));

// comparisons are always done in UTC
if (Carbon::now()->gte($internetWillBlowUpOn)) {
    die();
}

// Phew! Return to normal behaviour
Carbon::setTestNow();

if (Carbon::now()->isWeekend()) {
    echo 'Party!';
}
// Over 200 languages (and over 500 regional variants) supported:
echo Carbon::now()->subMinutes(2)->diffForHumans(); // '2 minutes ago'
echo Carbon::now()->subMinutes(2)->locale('zh_CN')->diffForHumans(); // '2分钟前'
echo Carbon::parse('2019-07-23 14:51')->isoFormat('LLLL'); // 'Tuesday, July 23, 2019 2:51 PM'
echo Carbon::parse('2019-07-23 14:51')->locale('fr_FR')->isoFormat('LLLL'); // 'mardi 23 juillet 2019 14:51'

// ... but also does 'from now', 'after' and 'before'
// rolling up to seconds, minutes, hours, days, months, years

$daysSinceEpoch = Carbon::createFromTimestamp(0)->diffInDays();