<?php
namespace App\Http\Controllers;

use Exception;
use Goutte\Client;
use Illuminate\Http\Request;

class analysisController extends Controller
{
    public function get_seo_result(Request $request)
    {

        $url = $request->input('url');
        $time = date('F d Y, h:i:s A');
        $client = new Client();
        $crawler = $client->request('GET', $url);

        //Image Size
        try {
            foreach ($crawler->filter('img') as $img) {
                if (filter_var($img->getAttribute('src'), FILTER_VALIDATE_URL)) {
                    $header_response = get_headers($img->getAttribute('src'), 1);
                    if (strpos($header_response[0], "200") !== false) {
                        $location[] = $img->getAttribute('src');
                        $bytes = $header_response["Content-Length"];
                        $image_size[] = $bytes / 1024;
                    }
                } else {
                    $pat_error[] = $img->getAttribute('src');
                }
            }
            $img_data = array_combine($location, $image_size);
        } catch (Exception $e) {}

        //Schema
        try {
            $schema_tags = $crawler->filter('[itemprop]')->each(function ($node) {
                return $node->text();
            });
            foreach ($crawler->filter('[itemscope]') as $frame) {
                $itemscope[] = $frame->getAttribute('itemtype');
            }

            $schema = $crawler->filterXpath('//script[@type="application/ld+json"]')->text();
            $schema_org = json_decode($schema, true);

            if (empty($schema_org['@graph'][0]['@type'])) {
                $org_schema = $schema_org['@type'];
                $name_schema = $schema_org['name'];
                $social_schema = $schema_org['sameAs'];
            } else {
                $org_schema = $schema_org['@graph'][0]['@type'];
                $name_schema = $schema_org['@graph'][0]['name'];
                $social_schema = $schema_org['@graph'][0]['sameAs'];
            }
        } catch (Exception $e) {}

        //As page on HTTPS
        try {
            if (parse_url($url, PHP_URL_SCHEME) === 'https') {
                $page_https = 'Page use HTTPS';
            } else {
                $page_https = 'Page not on HTTPS';

            }
        } catch (Exception $e) {}

        //SSL Checker
        try {
            $orignal_parse = parse_url($url, PHP_URL_HOST);
            $get = stream_context_create(array("ssl" => array("capture_peer_cert" => true)));
            $read = stream_socket_client("ssl://" . $orignal_parse . ":443", $errno, $errstr, 30, STREAM_CLIENT_CONNECT, $get);
            $cert = stream_context_get_params($read);
            $ssl_certificate = openssl_x509_parse($cert['options']['ssl']['peer_certificate']);

            $com_name = $ssl_certificate['subject']['CN'];
            $alt_name = $ssl_certificate['extensions']['subjectAltName'];

            $ssl_validFrom = date_create($ssl_certificate['validFrom']);
            $date_formate_from = date_format($ssl_validFrom, "Y/m/d");

            $ssl_validTo = date_create($ssl_certificate['validTo']);
            $date_formate_to = date_format($ssl_validTo, "Y-m-d");

            $ssl_issuer = $ssl_certificate['issuer']['CN'];
            $ssl_signature = $ssl_certificate['signatureTypeLN'];

        } catch (Exception $e) {}

        //Get Internal External links
        try {
            foreach ($crawler->filter('a') as $a) {
                $a_links[] = $a->getAttribute('href');
            }
            //extract Domain
            $domain = parse_url($url, PHP_URL_HOST);
            $domain_url = str_replace('www.', '', $domain);

            foreach ($a_links as $lnk) {
                if (strpos($lnk, $domain_url) !== false || strpos($lnk, "/") == '0') {
                    $internal_link[] = $lnk;
                } else {
                    $external_link[] = $lnk;
                }
            }
        } catch (Exception $e) {
        }
        //Link To Social Media Page
        try {
            $social_link = array('facebook.com', 'linkedin.com', 'twitter.com', 'youtube.com', 'instagram.com');
            foreach ($external_link as $ext) {
                foreach ($social_link as $social) {
                    if (strpos($ext, $social)) {
                        $link_to_social[] = $ext;
                    }
                }
            }
            foreach ($link_to_social as $val) {
                $path = parse_url($val, PHP_URL_PATH);
                if (strpos($path, pathinfo($domain_url, PATHINFO_FILENAME))) {
                    $social_media_link = 'link To Social Media page Found';
                }
            }

        } catch (Exception $e) {}

        //link pointing non https pages
        try {
            foreach ($crawler->filter('a') as $a) {
                $a_link[] = $a->getAttribute('href');

            }
            $count = 0;
            foreach ($a_link as $val) {
                if (parse_url($val, PHP_URL_SCHEME) !== 'https') {
                    $a_https = $count + 1;
                }
                $count++;
            }

            foreach ($crawler->filter('link') as $a) {
                $link[] = $a->getAttribute('href');

            }

            $count = 0;
            foreach ($link as $val) {
                if (parse_url($val, PHP_URL_SCHEME) !== 'https') {
                    $link_https = $count + 1;
                } else {
                    $link_https = '';
                }
                $count++;
            }

            foreach ($crawler->filter('script') as $a) {
                $script[] = $a->getAttribute('src');

            }
            $count = 0;
            foreach ($script as $val) {
                if (parse_url($val, PHP_URL_SCHEME) !== 'https') {
                    $script_https = $count + 1;
                }
                $count++;
            }
        } catch (Exception $e) {}

        //Robot.txt Checking
        try {
            $get_robot = file_get_contents($url . "/robots.txt");
            $robots = explode(" ", (str_replace("\r\n", " ", $get_robot)));
            $robot_txt = array_chunk($robots, 1);
            foreach ($robot_txt as $val) {
                $rob = $val;
                foreach ($rob as $data) {
                    $robot[] = $data;
                }
            }
        } catch (Exception $e) {}

        //Sitemap.XML Check
        try {
            $sitemap = file_get_contents($url . "sitemap.xml");
        } catch (Exception $e) {}

        //Check Broken Links
        try {
            foreach ($external as $ext) {
                $headers = get_headers($ext);
                preg_match('/\s(\d+)\s/', $headers[0], $matches);
                if ($matches[0] == 301) {
                    $status301[] = $matches[0];
                } elseif ($matches[0] == 302) {
                    $status302[] = $matches[0];
                } elseif ($matches[0] == 404) {
                    $status404[] = $matches[0];
                }
            }
        } catch (Exception $e) {}

        //Browser Cache Checking
        try {
            $headers = get_headers($url);
            foreach ($headers as $header) {
                if (stripos($header, "Cache-Control") !== false) {
                    $cache = $header;
                }
            }
        } catch (Exception $e) {
        }

        //HTTP Request & Content Breakdown
        try {
            foreach ($headers as $header) {
                if (strpos($header, "HTTP") !== false) {
                    $http[] = $header;
                }
            }
        } catch (Exception $e) {
        }

        //page word count
        $page = strip_tags($crawler->html());
        $exp = explode(" ", $page);
        $page_words = count($exp);

        //Text-HTML ratio
        $size = strlen($crawler->html());
        $page_size = round(strlen($crawler->html()) / 1024, 4);
        $page_text_ratio = $page_words / $size * 100;
        $page_words_size = round($page_words / 1024, 4);

        //page keywords
        try {
            $key_words = $crawler->filterXpath('//meta[@name="keywords"]')->attr('content');

            $words = str_word_count(strtolower($key_words), 1);
            $numWords = count($words);

            $word_count = (array_count_values($words));
            arsort($word_count);

        } catch (Exception $e) {
            $density_message = 'No keywords found on Page';
        }

        //URL Seo Result
        $url_len = strlen($url);
        if (preg_match("/[A-Z_]/", $url, $matches)) {
            $url_seo_friendly = "not seo friendly";
        } else if ($url_len > 75) {
            $url_seo_friendly = "Long URL";
        } else {
            $url_seo_friendly = "Seo Friendly";
        }

        //title & title length
        $title = $crawler->filter('title')->html();
        $title_length = strlen($title);

        //canonical Link
        try {
            $canonical = $crawler->filterXpath('//link[@rel="canonical"]')->attr('href');
        } catch (Exception $e) {
        }

        //meta description & length
        try {
            $meta = $crawler->filterXpath('//meta[@name="description"]')->attr('content');
        } catch (Exception $e) {
            $meta = '';
        }
        $meta_length = strlen($meta);

        //iframe
        foreach ($crawler->filter('iframe') as $frame) {
            $iframe = $frame->getAttribute('src');
        }

        $h1 = $crawler->filter('h1')->each(function ($node) {
            return $node->text();
        });
        $h1_tags = count($h1);

        $h2 = $crawler->filter('h2')->each(function ($node) {
            return $node->text();
        });
        $h2_tags = count($h2);

        $h3 = $crawler->filter('h3')->each(function ($node) {
            return $node->text();
        });
        $h3_tags = count($h3);

        //img Alt tags checks
        try {
            foreach ($crawler->filter('img') as $img) {
                $total[] = $img->getAttribute('alt');
                $all_img_src[] = $img->getAttribute('src');
            }
            $img_without_alt = array();
            foreach ($crawler->filter('img[alt=""]') as $img) {
                $img_without_alt[] = $img->getAttribute('src');
            }

            $img_alt = count($all_img_src) - count($img_without_alt);
            if (empty($img_without_alt)) {
                $img_miss_alt = '';
            } else {
                $img_miss_alt = count($img_without_alt);
            }

        } catch (Exception $e) {

        }

        //Page Score Passed
        try {
            if ($title_length > 30 && $title_length < 70) {
                $val1_pass = 3.7;
            } else {
                $val1_pass = 0;
            }
            if ($meta_length > 50 && $meta_length < 160) {
                $val2_pass = 3.7;
            } else {
                $val2_pass = 0;
            }
            if (!empty($canonical)) {
                $val3_pass = 3.7;
            } else {
                $val3_pass = 0;
            }
            if (!empty($schema_tags)) {
                $val4_pass = 3.7;
            } else {
                $val4_pass = 0;
            }
            if (empty($img_miss_alt)) {
                $val5_pass = 3.7;
            } else {
                $val5_pass = 0;
            }
            if ($url_seo_friendly == "Seo Friendly") {
                $val6_pass = 3.7;
            } else {
                $val6_pass = 0;
            }
            if (!empty($iframe)) {
                $val7_pass = 0;
            } else {
                $val7_pass = 3.7;
            }
            if ($h1_tags > 0) {
                $val8_pass = 3.7;
            } else {
                $val8_pass = 0;
            }
            if ($h2_tags > 0) {
                $val9_pass = 3.7;
            } else {
                $val9_pass = 0;
            }
            if ($h3_tags > 0) {
                $val10_pass = 3.7;
            } else {
                $val10_pass = 0;
            }
            if (!empty($word_count)) {
                $val11_pass = 3.7;
            } else {
                $val11_pass = 0;
            }
            if ($page_words) {
                $val12_pass = 3.7;
            } else {
                $val12_pass = 0;
            }
            if (!empty($cache)) {
                $val13_pass = 3.7;
            } else {
                $val13_pass = 0;
            }
            if (!empty($status404)) {
                $val14_pass = 0;
            } else {
                $val14_pass = 3.7;
            }
            if ($page_https == "Page use HTTPS") {
                $val15_pass = 3.7;
            } else {
                $val15_pass = 0;
            }
            if ($a_https !== null && $link_https !== null && $script_https !== null) {
                $val16_pass = 0;
            } else {
                $val16_pass = 3.7;
            }
            if (!empty($social_media_link)) {
                $val17_pass = 3.7;
            } else {
                $val17_pass = 0;
            }
            if (!empty($social_schema)) {
                $val18_pass = 3.7;
            } else {
                $val18_pass = 0;
            }
            if (!empty($robot)) {
                $val19_pass = 3.7;
            } else {
                $val19_pass = 0;
            }
            if (!empty($sitemap)) {
                $val20_pass = 3.7;
            } else {
                $val20_pass = 0;
            }
            if ($h1_tags > 0) {
                $val21_pass = 3.7;
            } else {
                $val21_pass = 0;
            }
            if ($h2_tags > 0) {
                $val22_pass = 3.7;
            } else {
                $val22_pass = 0;
            }
            if ($h3_tags > 0) {
                $val23_pass = 3.7;
            } else {
                $val23_pass = 0;
            }
            if (!empty($img_data)) {
                $val24_pass = 3.7;
            } else {
                $val24_pass = 0;
            }
            $text_html_ration = 3.7;
            $http_rquest = 3.7;
            $passed_score = $val1_pass + $val2_pass + $val3_pass + $val4_pass + $val5_pass + $val6_pass + $val7_pass + $val8_pass + $val9_pass
                 + $val10_pass + $val11_pass + $val12_pass + $val13_pass + $val14_pass + $val15_pass + $val16_pass + $val17_pass
                 + $val18_pass + $val19_pass + $val20_pass + $val21_pass + $val22_pass + $val23_pass + $val24_pass +
                $text_html_ration + $http_rquest;
        } catch (Exception $e) {}

        //Page Score Warning
        try {
            if ($title_length < 30) {
                $val1_warning = 3.7;
            } else {
                $val1_warning = 0;
            }
            if ($meta_length < 50 || $meta_length > 160) {
                $val2_warning = 3.7;
            } else {
                $val2_warning = 0;
            }
            if (empty($canonical)) {
                $val3_warning = 3.7;
            } else {
                $val3_warning = 0;
            }
            if (!empty($schema_tags)) {
                $val4_warning = 0;
            } else {
                $val4_warning = 3.7;
            }
            if (!empty($img_miss_alt)) {
                $val5_warning = 3.7;
            } else {
                $val5_warning = 0;
            }
            if ($url_seo_friendly == "Seo Friendly") {
                $val6_warning = 0;
            } else {
                $val6_warning = 3.7;
            }
            if (empty($iframe)) {
                $val7_warning = 0;
            } else {
                $val7_warning = 3.7;
            }
            if (empty($word_count)) {
                $val8_warning = 3.7;
            } else {
                $val8_warning = 0;
            }
            if ($page_words) {
                $val9_warning = 0;
            } else {
                $val9_warning = 3.7;
            }
            if (!empty($cache)) {
                $val10_warning = 0;
            } else {
                $val10_warning = 3.7;
            }
            if ($h1_tags > 0) {
                $val13_warning = 0;
            } else {
                $val13_warning = 3.7;
            }
            if ($h2_tags > 0) {
                $val14_warning = 0;
            } else {
                $val14_warning = 3.7;
            }
            if ($h3_tags > 0) {
                $val15_warning = 0;
            } else {
                $val15_warning = 3.7;
            }
            if (!empty($social_schema)) {
                $val16_warning = 0;
            } else {
                $val16_warning = 3.7;
            }
            if (!empty($social_media_link)) {
                $val17_warning = 0;
            } else {
                $val17_warning = 3.7;
            }
            if (!empty($robot)) {
                $val18_warning = 0;
            } else {
                $val18_warning = 3.7;
            }
            if (!empty($sitemap)) {
                $val19_warning = 0;
            } else {
                $val19_warning = 3.7;
            }

            $warning_score = $val1_warning + $val2_warning + $val3_warning + $val4_warning + $val5_warning + $val6_warning + $val7_warning
                 + $val8_warning + $val9_warning + $val10_warning + $val13_warning + $val14_warning
                 + $val15_warning + $val16_warning + $val7_warning + $val18_warning + $val19_warning;
        } catch (Exception $e) {}

        //Page Score Error
        try {
            if (!empty($status404)) {
                $val1_error = 3.7;
            } else {
                $val1_error = 0;
            }
            if ($page_https == "Page use HTTPS") {
                $val2_error = 0;
            } else {
                $val2_error = 3.7;
            }
            if ($a_https !== null && $link_https !== null && $script_https !== null) {
                $val3_error = 3.7;
            } else {
                $val3_error = 0;
            }
            if (!empty($img_data)) {
                $val4_pass = 0;
            } else {
                $val4_pass = 3.7;
            }

            $error_score = $val1_error + $val2_error + $val3_error + $val4_pass;
        } catch (Exception $e) {}
        $view = view("dashboard/seo_result", compact(
            'url', 'title', 'title_length', 'meta',
            'meta_length', 'img_alt', 'img_miss_alt',
            'iframe', 'all_img_src', 'canonical',
            'time', 'img_without_alt', 'url_seo_friendly',
            'h1', 'h1_tags', 'h2', 'h2_tags', 'h3', 'h3_tags',
            'word_count', 'numWords', 'density_message',
            'keyword_title', 'page_words', 'page_size', 'page_text_ratio',
            'page_words_size', 'http', 'cache', 'page_https',
            'status404', 'internal_link', 'a_https', 'link_https', 'script_https',
            'com_name', 'alt_name', 'date_formate_from', 'date_formate_to', 'ssl_issuer',
            'ssl_signature', 'social_media_link', 'robot', 'sitemap', 'schema_tags',
            'social_schema', 'passed_score', 'warning_score', 'error_score',
            'img_data'

        ));

        return $view;
    }

    public function get_audit_result(Request $request)
    {
        $url = $request->input('url');
        $time = date('F d Y, h:i:s A');
        $client = new Client();
        $crawler = $client->request('GET', $url);
        //links
        foreach ($crawler->filter('a') as $a) {
            $a_links[] = $a->getAttribute('href');
        }
        //extract Domain
        $domain = parse_url($url, PHP_URL_HOST);
        $domain_url = str_replace('www.', '', $domain);
        foreach ($a_links as $lnk) {
            if (strpos($lnk, $domain_url) !== false) {
                $internal_link[] = $lnk;
            } else {
                $external_link[] = $lnk;
            }
        }
        $pages_link = array_unique(array_filter($internal_link));

        foreach ($pages_link as $val) {
            if (parse_url($val, PHP_URL_SCHEME) === 'https' || parse_url($val, PHP_URL_SCHEME) === 'http') {
                $internal_pages[] = $val;
            }
        }

        try {
            foreach ($internal_pages as $val) {
                $crawler = $client->request('GET', $val);

                $h1 = $crawler->filter('h1')->each(function ($node) {
                    return $node->text();
                });
                if (count($h1) > 1) {
                    $links_more_h1[] = $val;
                } elseif (count($h1) < 1) {
                    $links_empty_h1[] = $val;

                }
                $total_h1[] = $h1;
                foreach ($h1 as $data) {
                    if (strlen($data) > 60) {
                        $h1_greater[] = $val;
                    } elseif (strlen($data) < 5) {
                        $h1_short[] = $val;
                    }

                }
                $card = $crawler->filter('meta[name="twitter:card"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $site = $crawler->filter('meta[name="twitter:site"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $title_twitter = $crawler->filter('meta[name="twitter:title"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $twitter_description = $crawler->filter('meta[name="twitter:description"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $image_twitter = $crawler->filter('meta[name="twitter:image"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $a = array();
                $twitter[] = array_push($a, $card, $site, $title_twitter, $twitter_description, $image_twitter);

                $graph_type = $crawler->filter('meta[property="og:type"]')->each(function ($node) {
                    return $node->attr('content');
                });
                $graph_title = $crawler->filter('meta[property="og:title"]')->each(function ($node) {
                    return $node->attr('content');
                });
                $graph_description = $crawler->filter('meta[property="og:description"]')->each(function ($node) {
                    return $node->attr('content');
                });
                $graph_image = $crawler->filter('meta[property="og:image"]')->each(function ($node) {
                    return $node->attr('content');
                });
                $graph_name = $crawler->filter('meta[property="og:site_name"]')->each(function ($node) {
                    return $node->attr('content');
                });
                $graph_url = $crawler->filter('meta[property="og:url"]')->each(function ($node) {
                    return $node->attr('content');
                });

                $b = array();
                $graph_data[] = array_push($b, $graph_type, $graph_title, $graph_description, $graph_image, $graph_name, $graph_url);

                $title = $crawler->filter('title')->html();
                if (!empty($title)) {
                    $page_with_title[] = $val;
                } else {
                    $page_miss_title[] = $val;
                }
                if (strlen($title) < 35) {
                    $short_title[] = $val;
                } elseif (strlen($title) > 60) {
                    $long_title[] = $val;
                }

                $length_url[] = strlen($val);

                //page word count
                $page = strip_tags($crawler->html());
                $exp = explode(" ", $page);
                $page_words = count($exp);
                $all_page_words[] = $page_words;

                //Text-HTML ratio
                $size = strlen($crawler->html());
                $page_size = round(strlen($crawler->html()) / 1024, 4);
                $page_text_ratio = $page_words / $size * 100;
                $page_words_size = round($page_words / 1024, 4);
                if ($page_text_ratio < 10) {
                    $less_code_ratio[] = $val;
                }

                $page_html = preg_replace('#<[^>]+>#', ' ', $crawler->html());
                $html_page = explode("\t\t\t", $page_html);
                $html_values = preg_replace('/\s+/', ' ', $html_page);
                $unique = array_unique($html_values);
                $duplicates = array_diff_assoc($html_values, $unique);

                foreach (array_map('trim', $duplicates) as $value) {
                    if ($value === $title) {
                        $duplicate_title[] = $val;
                    }
                }

                foreach ($crawler->filter('link[rel="canonical"]') as $can) {
                    if (!empty($can)) {
                        $link_canonical[] = $val;
                        $canonical[] = $can->getAttribute('href');
                    } else {
                        $page_miss_canonical[] = $val;
                    }
                }

                //meta description
                foreach ($crawler->filter('meta[name="description"]') as $desc) {
                    if (!empty($desc)) {
                        $meta = $desc->getAttribute('content');
                        if (strlen($meta) < 70) {
                            $short_meta_description[] = $val;
                        } elseif (strlen($meta) > 160) {
                            $long_meta_description[] = $val;
                        }
                        $page_link_description[] = $val;
                    }else{
                        $page_miss_meta[] = $val;
                    }
                }

                $redirect_links = get_headers($val);
                preg_match('/\s(\d+)\s/', $redirect_links[0], $matches);
                if ($matches[0] == 301) {
                    $status301[] = $matches[0];
                } elseif ($matches[0] == 302) {
                    $status302[] = $matches[0];
                } elseif ($matches[0] == 404) {
                    $status404[] = $matches[0];
                } elseif ($matches[0] == 500) {
                    $status500[] = $matches[0];
                }
            }
        } catch (Exception $e) {}
        //dd($short_meta_description,$long_meta_description);

        //Twitter card check
        try {
            foreach ($twitter as $tweet) {
                if ($tweet < 5) {
                    $card_incomplete = $tweet;
                }
            }
        } catch (Exception $e) {}
        //Open Graph check
        try {
            foreach ($graph_data as $val) {
                if ($val < 6) {
                    $graph_incomplete = $val;
                }

            }
        } catch (Exception $e) {}

        //H1 Tags Length
        try {
            $page_h1_greater = array_unique($h1_greater);
            $page_h1_less = array_unique($h1_short);
        } catch (Exception $e) {}

        try {
            $counts = array_count_values($meta);
            $duplicate_meta_description = array_filter($meta, function ($value) use ($counts) {
                return $counts[$value] > 1;
            });
        } catch (Exception $e) {}

        //Url Length
        try {
            foreach ($length_url as $val) {
                if (strlen($val) > 115) {
                    $url_length[] = $val;
                }
            }
        } catch (Exception $e) {}
        //Twitter Card and Open Graph Check
        try {
            $page_twitter_card = count($internal_pages) - count(array_filter($twitter_data));
            $page_open_graph = count($internal_pages) - count(array_filter($open_graph));
        } catch (Exception $e) {}
        // try {
        //     foreach ($meta as $val) {
        //         $length[] = strlen($val);
        //         if (strlen($val) < 70) {
        //             $short_meta_description[] = $val;
        //         } elseif (strlen($val) > 160) {
        //             $long_meta_description[] = $val;
        //         }
        //     }
        // } catch (Exception $e) {
        // }
        //Robot.txt
        try {
            $get_robot = file_get_contents($url . "/robots.txt");
            $robots = explode(" ", (str_replace("\r\n", " ", $get_robot)));
            $robot_txt = array_chunk($robots, 1);
            foreach ($robot_txt as $dat) {
                $rob = $dat;
                foreach ($rob as $data) {
                    $robot[] = $data;
                }
            }
        } catch (Exception $e) {}
        //page_words_count
        try {
            foreach ($all_page_words as $val) {
                if ($val < 50) {
                    $less_page_words[] = $val;
                }
            }
        } catch (Exception $e) {}

        return view("dashboard/audit_result",
            compact('url', 'time', 'page_h1_greater', 'page_h1_less', 'long_title', 'short_title', 'url_length',
                'page_twitter_card', 'page_open_graph', 'links_more_h1', 'less_code_ratio', 'short_meta_description',
                'long_meta_description', 'robot', 'less_page_words', 'links_empty_h1', 'duplicate_h1', 'page_miss_canonical',
                'page_miss_meta', 'duplicate_meta_description', 'card_incomplete', 'graph_incomplete', 'status301',
                'status302', 'status404', 'status500', 'page_miss_title', 'duplicate_title'
            ));
    }

}
