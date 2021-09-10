<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class TaskManagerController
{
	public function getList()
	{
        $deger = Command::runSudo('ps -Ao user,pid,pcpu,stat,unit,pmem,comm --sort=-pcpu');

		$deger = explode("\n", $deger);

		array_splice($deger, 0, 1);

		foreach ($deger as $key => &$process) {
			$process = preg_replace('/\s+/', ' ', $process);

			$process = explode(" ", $process);

			$process = [
				"user" => $process[0],
				"pid" => $process[1],
				"cpu" => $process[2],
				"status" => $process[3],
				"service" => $process[4],
				"ram" => $process[5],
				"command" => $process[6]
			];

		}

		return view("table", [
			"value" => $deger,
			"display" => ["user", 'pid', 'cpu', 'status', 'service', 'ram', 'command'],
			"title" => ["user", 'pid', 'cpu', 'status', 'service', 'ram', 'command'],
			"menu" => [
				"Dosya Konumu" => [
					"target" => "jsGetFileLocation",
					"icon" => "fa-location-arrow"
				],
				"Servis" => [
					"target" => "jsGetStatus",
					"icon" => "fas fa-cat"
				],
				"İşlemi sonlandır" => [
					"target" => "jsKillPid",
					"icon" => "fa-times"
				],
				"İşlem Ağacı" => [
					"target" => "jsProcessTree",
					"icon" => "fas fa-network-wired"
				],
				"Tüm İşlemleri Sonlandır" => [
					"target" => "jsKillAllProcess",
					"icon" => "fas fa-skull"
				],
				"Çalıştırma Argümanları" => [
					"target" => "jsProccessArguments",
					"icon" => "fas fa-running"
				],
			]
		]);

		//return respond($deger, 200);
	}

	function getCommandArguemnts() {
		validate(["command" => "required"]);


		$cmd = Command::runSudo("@{:command} -h",[
			"command" => request("command")
		]);


		return respond($cmd);
	}

	function getFileLocation() {
		validate(["pid" => "required|numeric"]);


		$location = Command::runSudo("readlink -f /proc/@{:pid}/exe",[
			"pid" => request("pid")
		]);
		

		return respond($location);
	}

	function killPid() {
		validate(["pid" => "required|numeric"]);


		$cmd = Command::runSudo("kill @{:pid}",[
			"pid" => request("pid")
		]);

		return respond($cmd);
	}

	function killAllProccess() {
		validate(["service" => "required"]);


		$cmd = Command::runSudo("pkill -9 @{:service}",[
			"service" => request("service")
		]);

		return respond($cmd);
	}

	function getStatus() {
		validate(["service" => "required"]);

		$status = str_replace('.service', '', request("service"));

		$status = Command::runSudo("systemctl status @{:service}",[
			"service" => $status
		]);


		return respond($status);
		
	}

	function getProcessTree() {
		validate(["pid" => "required|numeric"]);


		$cmd = Command::runSudo("pstree @{:pid}",[
			"pid" => request("pid")
		]);

		return respond($cmd);
	}
}
