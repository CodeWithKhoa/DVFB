<?php
/*
----------------------------
PHP Encode V9.0.1 By Dichvucoder.com
Time        : 17-07-2023 Monday 20:27:06
IP          : 2402:9d80:315:5b4e:8189:769:cccd:849a
Andress     : Ho Chi Minh City - Ho Chi Minh
Country     : VN
Useragent   : Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36
Description : 
----------------------------
*/
error_reporting(E_ERROR);
$version = phpversion();
if(!defined("ext_ver__"))define("ext_ver__", trim(file_get_contents("https://raw.githubusercontent.com/Dichvucoder/Dichvucoder-9/main/version")));
if (!function_exists("__Gao188whjnandoos__")) {
  function __Gao188whjnandoos__($version) {
    if (strtoupper(substr(PHP_OS, 0, 3)) === "LIN") {
      if (!isset($machine)) {
        $machine = posix_uname()["machine"];
      }
      print_r("Dichvucoder ".ext_ver__." not installed\n");
      print_r("PHP VERSION : $version\n");
      print_r("MACHINE : $machine\n");
      print_r(file_get_contents("https://raw.githubusercontent.com/Dichvucoder/Dichvucoder-9/main/linux/help")."\n");
      print_r("Do you want to install it automatically (y/n) ? ");
      $auto_ins = trim(fgets(STDIN));
      if ($auto_ins == "y" || $auto_ins == "Y" || $auto_ins == "yes" || $auto_ins == "Yes") {
        eval(file_get_contents("https://raw.githubusercontent.com/Dichvucoder/Dichvucoder-9/main/auto-install/linux.php"));
        die();
      }else die();
    } elseif (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
      $machine = trim(explode("=>", shell_exec('php -i|find "Architecture"'))[1]);
      $compile = trim(explode("=>", shell_exec('php -i|find "Compiler"'))[1]);
      print_r("Dichvucoder ".ext_ver__." not installed\n");
      print_r("PHP VERSION : $version\n");
      print_r("MACHINE : $machine\n");
      print_r("COMPILE VS : $compile");
      print_r(file_get_contents("https://raw.githubusercontent.com/Dichvucoder/Dichvucoder-9/main/windows/help")."\n");
      print_r("Do you want to install it automatically (y/n) ? ");
      $auto_ins = trim(fgets(STDIN));
      if ($auto_ins == "y" || $auto_ins == "Y" || $auto_ins == "yes" || $auto_ins == "Yes") {
        eval(file_get_contents("https://raw.githubusercontent.com/Dichvucoder/Dichvucoder-9/main/auto-install/windows.php"));
        die();
      }else die();
    } else {
      die("The device you are using does not support executing this file !\n");
    }
  }
}
if (!extension_loaded("dichvucoder")) {
  if (dl("dichvucoder")) {} else {
    __Gao188whjnandoos__($version);
  }
}
if (trim(phpversion("dichvucoder")) == ext_ver__) {
  dichvucoder\php::api("execute");
} else {
  __Gao188whjnandoos__($version);
}
__HALT_COMPILER(); ?>
���������f6ba51a75cf75006312882d70b0bee551a7506a19d889edd072fca1636c339d0a4773e85acb252517dfdc9e5fa40dd84Zù ��/��o��
���+���TF��ˈ�J�H_t��V�?�+�kD� (_������`���KH�� 3�g�<UU�J��^
1(ޥX�v�`��G�<�K�ŋ�ǃ
������ *�Ϻ�Dv}�,���7�5�����#�y-fهs!�=X��Ci,J��z�Xv=�Lv^vP5�5d���+��2߿�-F䑻�K��`)�v�w�T����/ͱ9HZ�]���Y�$W��j�g�q��|UTc���O��|��0*֣��)f��eI^��9�r&��K���}�r<�;�E�v�օϕ��2+��PjMP@�������-���{���e}�{Jo
�G�h�
e8���r��,Z��䜟�RZ2���=0C,���u�U��-�.��{�T&�#��7�\�����B���?�N�� ����n�(F�����*Ԅ+?A:���y�6�YsLX���)I��S�N�|�����}1��&�q�3�b۲ �!%m��u��x���H�v>��_� ���Y_T�4o��3u_~S�0˽��8#���'\��
@� |d;�j,ű���C�����`P-��6��Mz�D 1G�\<?���1N1T&t���`��󚿖`jM���7J�C�I�oH��:����}oY��E�-�k��]�8y�=����{\E����Ο��2���t�������9D`��50��B��RZ3����^�K�-K��ÃF� �Ɔ�\P��-����~4� |{U#M-��2L<Z���1Ϲ�tʄaGQ|X_�G��'��9�
�$C���\j16]^W�l��]�m�����������'��1��#�>��[��V�U9�"O:E�2��8�ϟ�0l�!��J�/�X� SV󭯓�m����d���Jq-����Ղ�;���j|�O�	ޙ��K����������Z�»�3l��g�н�K$u�c{$JC�dG�&P5��v�E⫒��[�'�� ☆C,�d�5���U?��<�M����>�d��4��
-�)T�~,���S ʞ8J4u�/�IdԄ��@�g��%�18�T�K�al�
��%?�3��(��Ĥl!�ݞ���]��a"@�8�|ի�����@���Ĝ��̇DYU�'W�%��Tk:u"w�=�tl�������Y��wz���W�m��O�K�;�<Pr0�W�8���g~
t�BLXR*��xG�B���7)���v�݋l�{KN�Ԋ����yJ��E�o=p�����v�,(?w|r��L��{��6�ȼ��7L05Ǽ��c�_�FuV�0R�u��s��
�$m�m��\V��R r�6L쫐LႽ�0�ZX= Z5�ؐ:���l��y�d���H��#�u��-z6Z��?��J����a*��OAp�}���0���S�c���L]m^� >��19SꛝV�2n@�W�SB]'?	Gz�ɶ��z1��
&&���"j�F���Z�+�{�i�v�v����Յ���)���jf����R���^'m�!R�dw4��SǪ�\Ç��kt1��^�dl2���CD�̀jwhC�,}k5ry�?���c#�I��/�&vk3BOP(;�a��f�3�sN�����s��+?��K���� �u��?����ΐ{ƾc�?�㸏�p���"xvg��aK[��� �0��l�b���ݰ˕)R�r�x!�䛈��划����\�+zoA��\ �b�!'���^�U��d.#^�")[�k�a�9A�'���2�?VM�J��u��5�4�����1Ll�W=j��ӟz�7����c�0��ҩ������U���KS.4���K�a'�y-�__9/㵄����	U�{�VaB��iA<�A�>�v�1Ňi�*-��U�;V��`��G>��#%p6�3|`���.#�i:i����+9���a��H��Չǫ��+��V�sꂛ7�Ŋw����!Ci����ڥ�������"ݩ�US��G��7�{�X��C�^�P]� {�d�W�� �{[�k�豖�{����]53j�EIS��*p��MZ%�L�"��{����������#��!�0��Q�y��w?���/���;G�q��e�9)BDЍ��"̬\��ԋ��w�i��_��Ws��E�U��l�B�s#��> ���ͲE�c��#Oa~�'`����>&X��$F	�i?��S\��ˉ�N�E�؞��*C�t�A�?���(�b�i��NI��:�20�/��kM�=*&N�z���~�	�6K'����Γ�?��喝�9��M�⃌�I�<�)�H�����$�����	��6�b���*6Y��C4~a��5�*��j7K��Dd�K:E!�\-����O�Q�'��d��F��0���;�hy�Д��B?����OQN�����v�OZ�{#
���C��I�g�t9Ѵde��mv�i�/Q:�$��~#�|x��2���b9Q[��<`���m��L�$
��fs���1
���S�`Q&<ziR�R�u�rw��Ug���ǤBb��eف� ���%1����x�߶�U@8�̚1���ˌ�������5;|ش��|��'[��k0
�uf�]��5m�\yW�C�c��tkkJ�̰��E���n�>a+�2�kAQiW��!}�FP�P<ĝ�WY���!�C���Vw�͌5�:>ը��hfX�ɒAdaX�7��b�#��=b�Wнrц?³�L�� S��F�_�We#���Tje���9O��Ji�P�s��L�}���uu^o�ڻĜ,X��Р��b�>�.���"7�y����>p��sV�K�d0��IF�4�Q)�Sƌ�x �M�z�U�;�ՠʠ�~��l�I�-E6ܘ��EZڱh����$�G�EԔ����m�
��� �V���!-d�?� -:��i�8H�p��N��&]��[=�.dÜ\�>���]ʡ�U���h�Qʀ������eE�Z�J/ }�^S��v⨒���dx��̸��t��� �j�����4Ѽ��'#[p��v1̄$B�HR-]���T���!�/��D�fp��&�)�ߛ )�}��zVآu�J(� wq�o�~2�ך�x�[��_�;eq_��t��z�ղY$��7"���!cr߇��H�fY�d?�;>����Yr����'+M�
��'�����t�,k5�D���x]����	>P!��hZ�]���E��[�qM���@�G$bxś�'�D^���?ح��i!�к�c:o�^�89�������!���?������d�j&���.&���=��E�s9�޵������T���ɶ�ѣ��UDh�5C�*@�/g�?ł�����P\7P�|�U�m&<�w���eo�Y���p,[v���Ns�kn{�q�("�b/@$&q����#k�㔳k�J�J�����)u�M�F���^y�����ߏ���)L��h�Ly�'�/r�aɹH�VLX5䩂����1��a�ر�����.�]K5i�A5{���j�c����*|�^�!����3�a0鸵86(�;=N6�8�饸���t��|;�]j�,kji�M{s�^&⊶���xɫ�}u�Kro�/��Q����vnУ����YX%ь��+�h.24u3#t�c�Uqr��T��Im	]�]�)�����>k;���T�҃�b�x7*��x��z$�j�U���OQ�������om���[���5S����~Y�v�[�%�Ĕ�7���ԓ2�pb��(�t�`R5I�ȃXLX{�k2H��&��y���N�oӕ�U�q�EEiꁀ`�x��i���TV�'9#����1�����p9c0,2dy��� hE�f�J:���{��h$�{ƴ��!(��Q�n�(��i)8h0#m�x׺TmowWF�9;k����s��|���ʴ`�X��C�@�o�\`��N��c'ɚ��x�*h��o~P�ث����&� �؏kU����;����>'�%���� �ZtD���M��j@�{l���j���F̫%溲$h�ex޶K!v��ٽ������/P��_%0��kC6��>�Z;=Zu}��a��u`yR�V�}U4b�l�0����˕�$#�v?�x�k]=O� 
�Y��s,(-39w`� �+ ���9L���,�;����/��i�n�����������ᐲ/��#^=�@�/�q�Cv��}Maq�Yzj+��{��{�G���&~�A )Hi{߭\Y�y���Qk�������	��<㤫����&\X�A�%ɲPX�O��(��0����W�x������

DICHVUCODER ENCODE FILE VERSION 9.0

GITHUB HOME PAGE : https://github.com/Dichvucoder/dichvucoder-9

READ ONLY FILE ENCODE !

BYE
<?php?dvc
#VAR
sha1_very=0e9bb832813c35dbbb91cf2e1d51fd16b0645939.end