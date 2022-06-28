<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'cekLogin' => \App\Filters\LoginFilter::class,
		'hasAdmin' => \App\Filters\AdminFilter::class,
		'hasApproval' => \App\Filters\ApprovalFilter::class,
		'sudahLogin' => \App\Filters\SudahLogin::class,
		'apiFilter' => \App\Filters\ApiFilter::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			// 'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [
		'cekLogin' => [
			'before' => [
				'app',
				'app/*',
			],
		],
		'hasAdmin' => [
			'before' => [
				'app/karyawan',
				'app/karyawan/*',
				'app/unit-kerja',
				'app/unit-kerja/*',
				'app/jabatan',
				'app/jabatan/*',
			]
		],
		'hasApproval' => [
			'before' => [
				'app/pengajuan-cuti/approval',
				'app/pengajuan-cuti/approval/*'
			]
		],
		'sudahLogin' => [
			'before' => 'app/login'
		],
		'apiFilter' => [
			'before' => [
				'api/data/*',
				'api/row/*',
				'api/usersinfo',
				'api/setuser'
			],
		]
	];
}