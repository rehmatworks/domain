<?php
namespace RehmatWorks\Domain;
use Carbon\Carbon;
use Exception, ErrorException;

class Domain {
    private $WhoisServers = [
        "net" => [
            "server" => "whois.verisign-grs.com",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "au" => [
            "server" => "whois.auda.org.au",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "al" => [
            "server" => "whois.akep.al",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "aero" => [
            "server" => "whois.aero",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "am" => [
            "server" => "whois.nic.am",
            "expiryRegex" => "/Expires:(.*)/",
            "expiryFormat" => false
        ],
        "ar" => [
            "server" => "whois.nic.ar",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "ax" => [
            "server" => "whois.ax",
            "expiryRegex" => "/expires..............:(.*)/",
            "expiryFormat" => false
        ],
        "be" => [
            "server" => "whois.dns.be",
            "expiryRegex" => "/expires..............:(.*)/",
            "expiryFormat" => false
        ],
        "bi" => [
            "server" => "whois1.nic.bi",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "biz" => [
            "server" => "whois.neulevel.biz",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "bg" => [
            "server" => "whois.dns.be",
            "expiryRegex" => "/expires..............:(.*)/",
            "expiryFormat" => false
        ],
        "bn" => [
            "server" => "whois.bnnic.bn",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "bo" => [
            "server" => "whois.nic.bo",
            "expiryRegex" => "/Fecha de vencimiento:(.*)/",
            "expiryFormat" => false
        ],
        "br" => [
            "server" => "whois.registro.br",
            "expiryRegex" => "/Fecha de vencimiento:(.*)/",
            "expiryFormat" => false
        ],
        "bw" => [
            "server" => "whois.nic.net.bw",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "by" => [
            "server" => "whois.cctld.by",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "ca" => [
            "server" => "whois.cira.ca",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "cf" => [
            "server" => "whois.dot.cf",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "cl" => [
            "server" => "whois.nic.cl",
            "expiryRegex" => "/Expiration date:(.*)/",
            "expiryFormat" => false
        ],
        "cn" => [
            "server" => "whois.cnnic.cn",
            "expiryRegex" => "/Expiration Time:(.*)/",
            "expiryFormat" => false
        ],
        "com" => [
            "server" => "whois.verisign-grs.com",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "cr" => [
            "server" => "whois.nic.cr",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "cz" => [
            "server" => "whois.nic.cz",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "dk" => [
            "server" => "whois.dk-hostmaster.dk",
            "expiryRegex" => "/Expires:(.*)/",
            "expiryFormat" => false
        ],
        "dm" => [
            "server" => "whois.nic.dm",
            "expiryRegex" => "/expiration date:(.*)/",
            "expiryFormat" => false
        ],
        "dz" => [
            "server" => "whois.nic.dz",
            "expiryRegex" => "/EXPIRES:(.*)/",
            "expiryFormat" => false
        ],
        "ee" => [
            "server" => "whois.tld.ee",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "eu" => [
            "server" => "whois.eu",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "fi" => [
            "server" => "whois.fi",
            "expiryRegex" => "/expires............:(.*)/",
            "expiryFormat" => false
        ],
        "fr" => [
            "server" => "whois.nic.fr",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "gf" => [
            "server" => "whois.mediaserv.net",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "gg" => [
            "server" => "whois.gg",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "gi" => [
            "server" => "whois2.afilias-grs.net",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "gq" => [
            "server" => "whois.dominio.gq",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "gy" => [
            "server" => "whois.registry.gy",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "hk" => [
            "server" => "whois.hkirc.hk",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "hm" => [
            "server" => "whois.registry.hm",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "hr" => [
            "server" => "whois.dns.hr",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "id" => [
            "server" => "whois.id",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "ie" => [
            "server" => "whois.iedr.ie",
            "expiryRegex" => "/Renewal Date:(.*)/",
            "expiryFormat" => false
        ],
        "il" => [
            "server" => "whois.isoc.org.il",
            "expiryRegex" => "/validity:(.*)/",
            "expiryFormat" => false
        ],
        "in" => [
            "server" => "whois.registry.in",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "info" => [
            "server" => "whois.afilias.info",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "iq" => [
            "server" => "whois.cmc.iq",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "ir" => [
            "server" => "whois.nic.ir",
            "expiryRegex" => "/expire-date:(.*)/",
            "expiryFormat" => false
        ],
        "is" => [
            "server" => "whois.isnic.is",
            "expiryRegex" => "/expires:(.*)/",
            "expiryFormat" => false
        ],
        "it" => [
            "server" => "whois.nic.it",
            "expiryRegex" => "/Expire Date:(.*)/",
            "expiryFormat" => false
        ],
        "je" => [
            "server" => "whois.je",
            "expiryRegex" => "/Expire Date:(.*)/",
            "expiryFormat" => false
        ],
        "jp" => [
            "server" => "whois.jprs.jp",
            "expiryRegex" => "/\[有効期限\](.*)/",
            "expiryFormat" => false
        ],
        "ke" => [
            "server" => "whois.kenic.or.ke",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "lk" => [
            "server" => "whois.nic.lk",
            "expiryRegex" => "/Expiration Date :(.*)/",
            "expiryFormat" => false
        ],
        "kg" => [
            "server" => "whois.kg",
            "expiryRegex" => "/Record expires on:(.*)/",
            "expiryFormat" => false
        ],
        "kr" => [
            "server" => "whois.kr",
            "expiryRegex" => "/사용 종료일                 :(.*)/",
            "expiryFormat" => "Y. m. d."
        ],
        "ky" => [
            "server" => "whois.kyregistry.ky",
            "expiryRegex" => "/Record expires on:(.*)/",
            "expiryFormat" => false
        ],
        "ls" => [
            "server" => "whois.nic.ls",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "lt" => [
            "server" => "whois.domreg.lt",
            "expiryRegex" => "/Expires:(.*)/",
            "expiryFormat" => false
        ],
        "lu" => [
            "server" => "whois.dns.lu",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "ma" => [
            "server" => "whois.registre.ma",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "mk" => [
            "server" => "whois.marnet.mk",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "ml" => [
            "server" => "whois.dot.ml",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "mo" => [
            "server" => "whois.monic.mo",
            "expiryRegex" => "/expires on(.*)/",
            "expiryFormat" => false
        ],
        "mq" => [
            "server" => "whois.mediaserv.net",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "mw" => [
            "server" => "whois.nic.mw",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "mx" => [
            "server" => "whois.mx",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "my" => [
            "server" => "whois.mynic.my",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "na" => [
            "server" => "whois.na-nic.com.na",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "nc" => [
            "server" => "whois.nc",
            "expiryRegex" => "/Expires on               :(.*)/",
            "expiryFormat" => false
        ],
        "ng" => [
            "server" => "whois.nic.net.ng",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "nl" => [
            "server" => "whois.domain-registry.nl",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "no" => [
            "server" => "whois.norid.no",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "nu" => [
            "server" => "whois.iis.nu",
            "expiryRegex" => "/expires:(.*)/",
            "expiryFormat" => false
        ],
        "nz" => [
            "server" => "whois.srs.net.nz",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "om" => [
            "server" => "whois.registry.om",
            "expiryRegex" => "/expires:(.*)/",
            "expiryFormat" => false
        ],
        "org" => [
            "server" => "whois.pir.org",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "pe" => [
            "server" => "kero.yachay.pe",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "pf" => [
            "server" => "whois.registry.pf",
            "expiryRegex" => "#Expire \(JJ/MM/AAAA\) :(.*)#",
            "expiryFormat" => "d/m/Y"
        ],
        "pl" => [
            "server" => "whois.dns.pl",
            "expiryRegex" => "/renewal date:(.*)/",
            "expiryFormat" => "Y.m.d H:i:s"
        ],
        "pr" => [
            "server" => "whois.afilias-srs.net",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "pt" => [
            "server" => "whois.dns.pt",
            "expiryRegex" => "/Expiration Date(.*)/",
            "expiryFormat" => false
        ],
        "qa" => [
            "server" => "whois.registry.qa",
            "expiryRegex" => "/Expiration Date(.*)/",
            "expiryFormat" => false
        ],
        "ro" => [
            "server" => "whois.rotld.ro",
            "expiryRegex" => "/Expires On:(.*)/",
            "expiryFormat" => false
        ],
        "rs" => [
            "server" => "whois.rnids.rs",
            "expiryRegex" => "/Expiration date:(.*)/",
            "expiryFormat" => false
        ],
        "ru" => [
            "server" => "whois.tcinet.ru",
            "expiryRegex" => "/paid-till:(.*)/",
            "expiryFormat" => false
        ],
        "sa" => [
            "server" => "whois.nic.net.sa",
            "expiryRegex" => "/paid-till:(.*)/",
            "expiryFormat" => false
        ],
        "sc" => [
            "server" => "whois2.afilias-grs.net",
            "expiryRegex" => "/Registry Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "se" => [
            "server" => "whois.iis.se",
            "expiryRegex" => "/expires:(.*)/",
            "expiryFormat" => false
        ],
        "sg" => [
            "server" => "whois.sgnic.sg",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "si" => [
            "server" => "whois.register.si",
            "expiryRegex" => "/expire:(.*)/",
            "expiryFormat" => false
        ],
        "sk" => [
            "server" => "whois.sk-nic.sk",
            "expiryRegex" => "/Valid Until:(.*)/",
            "expiryFormat" => false
        ],
        "sn" => [
            "server" => "whois.nic.sn",
            "expiryRegex" => "/Date d'expiration:(.*)/",
            "expiryFormat" => false
        ],
        "st" => [
            "server" => "whois.nic.st",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "su" => [
            "server" => "whois.tcinet.ru",
            "expiryRegex" => "/paid-till:(.*)/",
            "expiryFormat" => false
        ],
        "sx" => [
            "server" => "whois.sx",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "sy" => [
            "server" => "whois.tld.sy",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "td" => [
            "server" => "41.74.44.44",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "tg" => [
            "server" => "whois.nic.tg",
            "expiryRegex" => "/Expiration:.........(.*)/",
            "expiryFormat" => false
        ],
        "th" => [
            "server" => "whois.thnic.co.th",
            "expiryRegex" => "/Exp date:(.*)/",
            "expiryFormat" => false
        ],
        "tm" => [
            "server" => "whois.nic.tm",
            "expiryRegex" => "/Expiry :(.*)/",
            "expiryFormat" => false
        ],
        "tn" => [
            "server" => "whois.ati.tn",
            "expiryRegex" => "/Expiry :(.*)/",
            "expiryFormat" => false
        ],
        "to" => [
            "server" => "whois.tonic.to",
            "expiryRegex" => "/Expiry :(.*)/",
            "expiryFormat" => false
        ],
        "tw" => [
            "server" => "whois.twnic.net.tw",
            "expiryRegex" => "/Record expires on(.*)\(/",
            "expiryFormat" => false
        ],
        "tz" => [
            "server" => "whois.tznic.or.tz",
            "expiryRegex" => "/Record expires on(.*)\(/",
            "expiryFormat" => false
        ],
        "ua" => [
            "server" => "whois.ua",
            "expiryRegex" => "/expires: (.*)/",
            "expiryFormat" => false
        ],
        "ug" => [
            "server" => "whois.co.ug",
            "expiryRegex" => "/Expires On:(.*)/",
            "expiryFormat" => false
        ],
        "uk" => [
            "server" => "whois.nic.uk",
            "expiryRegex" => "/Expiry date:(.*)/",
            "expiryFormat" => false
        ],
        "uy" => [
            "server" => "whois.nic.org.uy",
            "expiryRegex" => "/Expiry date:(.*)/",
            "expiryFormat" => false
        ],
        "uz" => [
            "server" => "whois.cctld.uz",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
        "vc" => [
            "server" => "whois2.afilias-grs.net",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "vu" => [
            "server" => "vunic.vu",
            "expiryRegex" => "/Expiry Date:(.*)/",
            "expiryFormat" => false
        ],
        "ws" => [
            "server" => "whois.website.ws",
            "expiryRegex" => "/Expiration Date:(.*)/",
            "expiryFormat" => false
        ],
    ];

    public function expiry($domain)
    {
        $whoisServers = $this->WhoisServers;
        $domain = trim($domain);
        $disallowed = ['http://', 'https://'];
        $domain = str_replace($disallowed, ['', ''], $domain);
        if(substr(strtolower($domain), 0, 4) == "www.") {
            $domain = substr($domain, 4);
        }
        $domain_parts = explode(".", $domain);
        $tld = strtolower(array_pop($domain_parts));
        if(!isset($whoisServers[$tld]))
        {
            $whoisServers[$tld] = [
                "server" => "whois.nic.$tld",
                "expiryRegex" => "/Expiry Date:(.*)/",
                "expiryFormat" => false
            ];
        }

        try {
            $server = $whoisServers[$tld];
            $res = $this->QueryWhoisServer($server["server"], $domain);
            if ($res && preg_match($server["expiryRegex"], $res, $match)) {
                if(isset($match[1])) {
                    $expiryRaw = trim($match[1]);
                    if($server["expiryFormat"]) {
                        try {
                            $expiry = Carbon::createFromFormat($server["expiryFormat"], $expiryRaw);
                        } catch(Exception $e)
                        {
                            return false;
                        }
                    } else {
                        $expiry = $expiryRaw;
                    }
                    try {
                        return Carbon::parse($expiry);
                    } catch(Exception $e)
                    {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } catch(ErrorException $e) {
            return false;
        }
    }

    private function QueryWhoisServer($whoisserver, $domain)
    {
        $port = 43;
        $timeout = 10;
        $fp = @fsockopen($whoisserver, $port, $errno, $errstr, $timeout) or false;
        if(!$fp) {
            return false;
        }
        fputs($fp, $domain . "\r\n");
        $out = "";
        while (!feof($fp)) {
            $out .= fgets($fp);
        }
        fclose($fp);

        $res = "";
        if((strpos(strtolower($out), "error") === FALSE) && (strpos(strtolower($out), "not allocated") === FALSE)) {
            $rows = explode("\n", $out);
            foreach ($rows as $row) {
                $row = trim($row);
                if (($row != '') && ($row{0} != '#') && ($row{0} != '%')) {
                    $res .= $row . "\n";
                }
            }
        }
        return $res;
    }
}
