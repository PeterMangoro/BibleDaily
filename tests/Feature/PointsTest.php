
<?php

use App\Models\Reading;
use App\ValueObjects\MakePoints;

use function PHPUnit\Framework\assertEquals;

it('converts strings to array', function () {
   $reading = Reading::create([
      'bible_session_id' => 1,
      'read' => 'genesis 1vs1',
      'notes' => 'some notes',
      'prayer_points' => 'some*prayer*points'
   ]);

   $this->assertEquals(MakePoints::from('some*prayer*points'), $reading->prayer_points);
   $this->assertEquals(MakePoints::from('some notes'), $reading->notes);
});
