<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ExampleProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
                array (
                    'created_at' => '2022-04-24 20:20:43',
                    'id' => 1,
                    'image' => 'eyJpdiI6IjZyVTNEK3R3M1ZHVWNpdXJaUzFoSVE9PSIsInZhbHVlIjoiWG8vcldaVnFyaG11MHZySnl2VWtiVDUrR2xaSkRRbTU0alh5L2VPWlNwUDBYRGxGZE13Y21XNmlFMlYyVDZlMmR6bWtUcnJTbFdwdC9UK3IyMEVSM2tldldyRXBZRWtDd3p4ZzRrNUlCdWMxRlc2ekZ4UmwrVDFKU0tGbkpMeWhEbVBjUTh6NmZIOHlPcmtkUzRQYVhPbWZWenoraFdzeWFXblh3SGN0Y3F3PSIsIm1hYyI6IjJlNmY0MTczMGY0NjA0NzVjMGYyYWVhYjI4Y2Q3NTYzYmNmNTdlYzMxMjEzZTBkYTY3YzE5OWFiNTE0ZTU4YTciLCJ0YWciOiIifQ==',
                    'link' => 'eyJpdiI6Ik0xMzZiNTZ5QmczaHcyZ2duNWdkU2c9PSIsInZhbHVlIjoiQk1TL0Q2ektOTENUcjlxclZCY01HS3RWQlhHUlRrUVFhM3VzcGJ4TWhPbFNXZVY1VUs0cnlwK2FrUFBHVWlSTjZZMU5mTTdvQjZ3K0RKT3k4NnF5c3VCUDQ3L3ZVWXIzSXRKYzlEeHpHTjFaWmxsQVd6azhicG1LUkNWdHgrajlhTFNBRjhUNTJvK3pxV2owNUVvT3hBPT0iLCJtYWMiOiI0MmU3NzZlNjQ3MDI3NjYzZWE3NzdlZWUzYTY5MGFhY2JiN2EwZDNmNzMyOTljZmE5MmZjZjRkMTNlMjczMjIyIiwidGFnIjoiIn0=',
                    'subtitle' => NULL,
                    'title' => 'eyJpdiI6InNtTGVWOXM0cHdzSEMxWVJCZkhPeFE9PSIsInZhbHVlIjoiV2Y2L2NvcDNUUnRxTXBhc0V0eHI5d3pXOEdOQlJQSDhETWc5ZFB1aEwxN0I3Y3hDaWQ4RWVvMkFKQ3NmbndYRTVjSUQzZ0xNSTJhZm5rM1pjSnd5eHkvNVF4SXNodHZRRFBzQ2JzVDZ2UWs9IiwibWFjIjoiNzI1NTFiNjFhNGI0OGQxNjBjZDljNzMzM2M0MGYyNTNhMWMxOWE4MjBmMzRkZTVjNTI3ODliOTQ3NWY2MTliMyIsInRhZyI6IiJ9',
                    'updated_at' => '2022-05-17 23:02:27',
                ),
            1 =>
                array (
                    'created_at' => '2022-04-24 20:21:11',
                    'id' => 2,
                    'image' => 'eyJpdiI6IlNTN0xQK0EzeDNLOFJFSmRpVXdUaUE9PSIsInZhbHVlIjoiSktBVEdrMmdXVkpOM2NhOTlITkRTL1JwZCszdmhKVm9LQkJjNlB6Y3ZNNm4yZXRuNDRwSVY4bXkxS2kyQU13anRnSW1ZT2Uza0ZrMUh5a21JZ0o1N3NwSDl4clRQTmRVMGNicDZ0MWVVODB2RXFjdUhyeklVRFRLZS9CZW5SQjNvZzkzOUNmTlNxS2t2c0dEMjJQSWRHNmNicFExQUdZR21zRWxzNVhISHYwPSIsIm1hYyI6IjIxYzA3NmY0MGE5NzNmYTJiMjVhODgzMjAzMjIyNWJkZTBlMTRiMWM2ZTNmMDYxZjA3ZjQ1N2YwOTFjZDQ3NWYiLCJ0YWciOiIifQ==',
                    'link' => 'eyJpdiI6IjZEYzBoOU11NDNObmNjbDlPNFdFNEE9PSIsInZhbHVlIjoidlNRTnZMZGRITjNyb3pHOWVjTUV6Q1VrZkVpTmJRM0lJYk13UmlaQkNtMDA5VDludWxReGU3alBWVDRIRVkwRXIvOTBTSGhYVUcyZkY1aVM4c1ZhZ04vci8wbjUxZ2VTSUtKaVUwUnBGTThKdFgyd0F6Z1hUd0ZQRzR6NEVNNjIiLCJtYWMiOiJmNjBiYTJmZWM2ZjA2NGNlM2M2MDJmZWMwZGM5NzhhMjAzMzkyYWI2ZGE3YTczOTY2YjU4ODMwOWFjNWE5ZjM4IiwidGFnIjoiIn0=',
                    'subtitle' => NULL,
                    'title' => 'eyJpdiI6IldMeXZ3SFZnYi9uNzJlTnJSd3ZUMGc9PSIsInZhbHVlIjoia1lSS3ZaOWhwNWV6d0FxVDZNM1RZdFFUWnQrK2xkQnBGbWs2SEhCbHZYMUlnbFcxeGVJYXBTVXlYbXJ3dENXZnVEanA4RlkwSTcrVFg2WE9aZWhrZ3c9PSIsIm1hYyI6ImEwZWNmNzZmNDRiZWMwNjQ1NDY5NDVhYjQyZDJiNWYxNjI4ZjdhNjkxOTA1Y2ZmNTU4MzZkMDg4ZmIwNmZiNTciLCJ0YWciOiIifQ==',
                    'updated_at' => '2022-05-17 23:01:11',
                ),
            2 =>
                array (
                    'created_at' => '2022-04-24 20:21:34',
                    'id' => 3,
                    'image' => 'eyJpdiI6IjRsVUphRnF6YW9BZVdsUExUdnhEZkE9PSIsInZhbHVlIjoiSmZoRHl1Z05wanBmVXB5d29pTmh5VGkvZ0pxYzNOSmFuSzQ1L2Znc0xpQ0Fpa3pjQmRKRTB4Qk5qcDlvcVdHSTEvU3FIMytMM0FucTB3Z1dDeGZaMXZDSUtpbFZuWFhiclFyUGRsUmlPS3VsNkN0S1ArdWwrKytOdkQ4ZHZtS2p6VmdUNjZvTE8zYk5DaSt6Wmh6NWJLUEt5WkpDWWNkeWVoUWhNOXd4S09VPSIsIm1hYyI6IjBmMDMxOTIzOTcyMzA3NWY5ODA2YWJmOTdjMjBiYjMwM2IwY2NlMjFkYjVjMWRiYThjNmM4NjhhY2EwNjRkYzkiLCJ0YWciOiIifQ==',
                    'link' => 'eyJpdiI6IlFHdkRXSDd2b2lqSFlqMWVld3VMZmc9PSIsInZhbHVlIjoiZkh4VXNWUDhoOXYwcWQ2Nzc2S1pnRjFKcWlWKzl1U2tVUmFTdys4ajRCZCtaQjY4S3dCd2lTOVJ0VFdiOFpnZ0lsU1BaWVMyRVd2QlAwM091VjN1MGwzK21uWWwrZkI4MUIxWUl4dVRsdVhUaWIxclRqNUhUQ2s3eUZaL0lkUmYiLCJtYWMiOiI1Y2IyYTQ5MDdiNTYwODdhNThkZTMwZmU5NGU5MjY0NWZmMDE5Y2RkNDNhYTc0NjUwMDZjODcxZmZhN2ZkZjEwIiwidGFnIjoiIn0=',
                    'subtitle' => NULL,
                    'title' => 'eyJpdiI6IkRGU1pnYi9rRWE5VXkxR05VdHAyTGc9PSIsInZhbHVlIjoianZaK3hDMFloZ0VtMFJLOU11VStrNWp1YzF4S3k2UlZ1RmRCWHM0Mk1LL29OQWJkdEVrd2ZtS0k4TmgvUmdXOEQvdk9XZm1KZDlzaTFid3FCdXBTNVE9PSIsIm1hYyI6IjliNzM5ZDgyMmYwOGJlMzM0YWY3ZDg5ODAzMmNiODA0MjlmZmM1NjRmMTJmMDNiYzgyZWE2ODczZGU5YTIzNDgiLCJ0YWciOiIifQ==',
                    'updated_at' => '2022-05-17 23:02:42',
                ),
            3 =>
                array (
                    'created_at' => '2022-04-24 20:22:09',
                    'id' => 4,
                    'image' => 'eyJpdiI6Ild0Y1lnMkZwZHExTXJHNXBpRWVjNVE9PSIsInZhbHVlIjoiOVFaeThyY1N3a3lwMVlYSFhyaFArcWVwcDBpQ1ZBczNyRTNKSzhQNnRqclhCQWJXa1pGa3BlOUtxZUNJZ0ZSVk9BRVVoMG8xTUNWbGtRUTQyUmtneW9qRTFKRk11M1FEMUdTV1R1OWdOKzlxMXYrQnpyZmo5eURodDlKRFZZQ25aY1BZY0FPaWFPaGVZeDNPMFpvR1BlblBVbUZ4b3lUaE5HbU9nVERZd3JzPSIsIm1hYyI6ImFlMTNiMmYzNmJkMjYzNDRhNzFkOGNhMDZhNGZlZGY1NzNhZTExNzlmNTM5NTZkMzFkNWFlNDhjNTdmOTJiM2YiLCJ0YWciOiIifQ==',
                    'link' => 'eyJpdiI6Img3YmxTMVdpb1c3RXJOTkE4bWtMSXc9PSIsInZhbHVlIjoiRytlVUpTNjdoR2dVbmd6SjhIL216anRNOFRMS2RrZUZqS0xBR3BZblk4K2hwa2syYXBKaUFiMkRJcytyUWxRSGFLbDZ2NmZycXpiVk0ycWtYMWVqc29sUzlrZnhSajFhRExrWFNZR0hhekhsdk4rVmdQVi9uZTVvMms0NnlBU1hqcjM4NzFGMTRnRnFWcVZ4WXlETW1RPT0iLCJtYWMiOiJhNDAzYzhhODlkMDBjMTJkYWMxNDE4ODcxYzFlY2EyMmVhMmMxMTg5YTFmNjdmZTBlNmMzOTc5MWQxZjc1MTMzIiwidGFnIjoiIn0=',
                    'subtitle' => NULL,
                    'title' => 'eyJpdiI6IjNEYmFIbWd0SVk1VERVM2w4UHFwR0E9PSIsInZhbHVlIjoidGpFV3MzU29leXM4YVludUtlQVF1WVRVTE83aXdvN3JRYVBadDR0bi9wZzJacHU5SkZ5Zi9LWUNpbCtrcEFNY3hjZTNpNkFkWE95RXhoN0VZS01BWXRwT0FCTjE2amhPanN5SkpHekJpd3M9IiwibWFjIjoiZjM0YjFkNmYyYWRiNDNjOGFiY2RlNDVkMDMyODhlYTVlNWFkYTg2ZDdiZDRjMWU0ZWMzNWI1Nzc0MDgyYmIzZCIsInRhZyI6IiJ9',
                    'updated_at' => '2022-05-17 23:01:46',
                ),
            4 =>
                array (
                    'created_at' => '2022-04-24 20:22:44',
                    'id' => 5,
                    'image' => 'eyJpdiI6IldoUHNQcFFXL1RaTlJCWko0QlJzNXc9PSIsInZhbHVlIjoiUU1KcFJUSzYvVHpMc3Iyc0JyNng5N0VVOEYrUUEweHg0VzZMdThpeXB4eW9YSCtNaUZSekdNVVBHYmxxUHRGTzZUTWd2bUk5RHF0YnhZUnBmNndmWm9tV1NVQ2VhM21SRWZrRHYxTUxnc3VZemo0bnVORGZacDluYTkvakg5aEJDM3R2M2ZHWE9aNHZES2w3d1NRMTBCeUNkL3RWUlkvOUU5c09zWWVOcm84PSIsIm1hYyI6IjQ2NTVjNmE1Y2M1ZWQ4NTc2NTY1ZGU3OTBiOTA3OGE1MDg5N2MzODlhZmY5NjI0MDNjNmEzMDllMDhlNTg3MWUiLCJ0YWciOiIifQ==',
                    'link' => 'eyJpdiI6IlRIVVRPZWlPR3FnQi9YZjh1ZGRZcHc9PSIsInZhbHVlIjoiRGZyWU1JK0VmRzVqWnVWTUhhbm85eWJFdzQ5ZUcxT056L0Z0ZThkcTN6RG1paGgzbk5IWWZWam8reDY2aHBQRFZBeVZ5T29IaHpYYjFndHBkallIdGs3azE5T3o4RFUyTFBEdFFWWFhyeUVNdUJkOEhaWWRlSmF5bkt0WTdLVTRuZ25hd0hoV1BwUmJuTFBxK0RMek93PT0iLCJtYWMiOiJhNzBhMzY4YjcwMmEyNDE0MTY0ODc5MTkwNjU0MmI3MWJmNWQ2MjAwNWE4N2U2NGZhMGY4ODE3MjgyYzJlYzE5IiwidGFnIjoiIn0=',
                    'subtitle' => NULL,
                    'title' => 'eyJpdiI6IjhVNnZJemU4Ty9oaWVWS01EcFFoYnc9PSIsInZhbHVlIjoiM1J4b0l5ZGMxUFBxTHBMazluMUNtNkNsQ0dwaWorQnAxZlFJUmViVmhsVUtIc3FwVDErOFNCTVJxVFNUd1BiNHVkM0tCYUJFaXBUYnJmUy94dFp5SkE9PSIsIm1hYyI6IjE3MzRjYjQ3MTRiN2Y2Y2QwNDUyOGMwNGE0ZGI4OWYxOWQ3ODhiMDhhZWI0N2QzYzI0NDExYWIzNDNjNzVjYjIiLCJ0YWciOiIifQ==',
                    'updated_at' => '2022-05-17 23:01:26',
                ),
        ));


    }
}
