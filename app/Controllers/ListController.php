<?php
namespace App\Controllers;
use Liman\Toolkit\Shell\Command;

class ListController
{
	public function getExtensionList()
	{
        $deger = Command::runSudo("ls -la /liman/extensions/ilkeklentim");

		$deger = explode("\n", $deger);

		array_splice($deger, 0, 1);

		foreach ($deger as $key => &$process) {
			$process = preg_replace('/\s+/', ' ', $process);

			$process = explode(" ", $process);

			$process = [
				"permissions" => $process[0],
				"files" => $process[1],
				"group1" => $process[2],
				"group2" => $process[3],
				"volume" => $process[4],
				"month" => $process[5],
				"day" => $process[6],
                "hour" => $process[7],
                "name" =>  $process[8]
			];

		}

		return view("table", [
			"value" => $deger,
			"display" => ["permissions", 'files', 'group1', 'group2', 'volume', 'month', 'day' , 'hour', 'name'],
			"title" => ["permissions", 'files', 'group1', 'group2', 'volume', 'month', 'day', 'hour', 'name'],
			"menu" => [
				"Sil" => [
					"target" => "jsRemoveFile",
					"icon" => "fa-location-arrow"
				],
			]
		]);

		//return respond($deger);
	}

	function deleteFile() {
		validate(["name" => "required"]);

		$name = request("name");

		$cmd = Command::runSudo("rm /liman/extensions/ilkeklentim/@{:name}",[
			"name" => $name
		]);

		return respond($cmd);
	}
}
