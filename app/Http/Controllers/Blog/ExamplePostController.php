<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Parsedown;


class ExamplePostController extends Controller
{
    function show($post_id){
        $title = "Example Title";
        $content = "Example Content";

        $title = '日的及度加機子魚年';
        $content = '# Nisi virgine

## Fuerant centum

Lorem markdownum Orci! Non numine, tenax Lacon natas iubet ferox hostia posita
regnumque hanc manu eripui tibia.

    rom += widget(sram_namespace_memory(web_online_troubleshooting,
            throughputAutoresponderCopyright, dvHoneypotTrash) - script_dock,
            ict + cable(design, 4), 5);
    ics_interlaced.fi += cybersquatter + null_raw_dv.lion_power_uddi(18);
    if (supply != tftpDpi) {
        floppy_webmail -= runtime(networkApplet, beta, 62);
        recursion_hardening_grep(-1 + lampOptical, 5, -2);
        cmos += it(prebindingCronKeywords);
    } else {
        compiler = 3;
        algorithmTtlCross(master_raid, program_antivirus_metadata *
                contextualIpod, drop);
        vpnFile(rpm_jsp(dtd_task_secondary, -2, simm));
    }
    if (throughput_trackball_media <= user) {
        meta_windows -= netbios_smartphone_osd(91 - module, payloadRemote);
        ocr_mode = prebindingSpoolingRecycle.volume_rgb_shift(import + 1);
        rdramWinsThin = mirrored(import_only_key.gpu(fiber, isdnJreOffice),
                optical(ivr, input_pinterest, -2));
    } else {
        key(key(keylogger, day_core_cybercrime));
    }
    if (data_hypermedia < cron(encodingWins, ctrAddress + proxyBacksideVersion,
            apacheCgiView)) {
        clip_gate_zebibyte(directoryPretestPing * windows, diskMotion, 38);
    }

## Ast pompa iamque fuit profanam

Decipiet inpleat acrior: capienda frondes. Iram hic, *Tartara*. A gloria
lapidosas arva, numerem. Nec ora pectoraque magna Priamidenque quinos vada tergo
ecce vires nititur tot in egreditur *perdiderat habitantque* capillos tellus.

## Forcipe magnanimus populos

Oriens veneno contactu; per mille in vestigia: montes ramos stirpe spemque
pectora! Ionium excutit carinae, cornuque ore pompa et modo diu [est parilique
Troia](http://nunc.io/) et munere. Non ipsa patientia dixit.

## Et possent unda dolore capiti

Palati more deae fecissem hirsutaque Haemoniae ubi a madidis ponere Troades;
temptata rapiunt cuspidis. Aevi *canos torreri* intertextos erroribus sine
sulcis. Pollens dum magno [laudatis](http://ignes.io/) cruentior, huius
[hic](http://www.satis.io/trahebatpudici).

Quod sum, demisit corpore. Direptos capacibus qua nec fidem pulsavere fugiunt
habendum ceciderunt verum.

## Iamque cutis

Es dolor: care de viam vocatus terra. Nostras quam. Sunt suntque flumine sol
grates furor scilicet iacent canentis iuncisque sibi. Tibi superis festis.

Demittite quam qui, ad dum adspicit vulnera liquor moventur. Aequor conpellat
curvamine *dixi vim* servat postponere et fata tangeret sternit dubitat et Minos
fortis, foret antiquarum. Sanguine tosta adunco, claudit quem tulit fatali
redolentia rogat, dona favet taurorum meae. Limus et cernunt veribus dolore quam
ultimus. Perseus sinistrum comitata iustissima iacet.
';

        {
            $Parsedown = new Parsedown();
            $content = $Parsedown->text($content);
        }

        return view('blog.post', [
            "title" => $title,
            'content' => $content,
        ]);
    }
}
