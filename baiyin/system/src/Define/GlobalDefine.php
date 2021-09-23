<?php
//error_reporting(E_ALL);
// data type
const TYPE_NULL     = 0x00;
const TYPE_INT      = 0x11;
const TYPE_FLOAT    = 0x12;
const TYPE_BOOL     = 0x21;
const TYPE_STR      = 0x31;
const TYPE_TIME     = 0x41;
const TYPE_DATE     = 0x42;
const TYPE_STR_TRUE = 0x43;

// os
const OSID_WEB      = 10;
const OSID_WINDOWS  = 11;
const OSID_LINUX    = 12;
const OSID_MACOS    = 13;
const OSID_APP      = 20;
const OSID_ANDROID  = 21;
const OSID_IOS      = 22;

// http content type
const HTTP_CT_KEY = 'Content-Type';
const HTTP_CT_VALUE_TEXT = 'text/plain;charset=utf-8';

// response status code
const SC_OK             = 200;
const SC_BAD_REQUEST    = 400;
const SC_UNAUTHORIZED   = 401;
const SC_FORBIDDEN      = 403;
const SC_NOT_FOUND      = 404;
const SC_NOT_ALLOWED    = 405;
const SC_NOT_ACCEPT     = 406;
const SC_TIMEOUT        = 408;
const SC_CONFLICT       = 409;
const SC_SERVER_ERROR   = 500;

// page
const DEF_CUR_PAGE  = 1;    // default current page

// package name
const PACKAGE_NAME_TTMS = 'com.huawenpicture.ttms';
const PACKAGE_NAME_EIMS = 'com.huawenpicture.eims';
const PACKAGE_NAME_ROMS = 'com.huawenpicture.roms';
//const PACKAGE_NAME_FPMS = 'com.tianhuajunze.fund';
const PACKAGE_NAME_FPMS = 'com.zhongfucaifu.fund';

// client version
const LAST_CLIENT_VER_TTMS_AND  = 20060801; // 20052801
const LAST_CLIENT_VER_TTMS_IOS  = 20060801; // 20052801
const LAST_CLIENT_VER_EIMS_AND  = 20071301; // 20060801
const LAST_CLIENT_VER_EIMS_IOS  = 20071301; // 20060801
const LAST_CLIENT_VER_ROMS_AND  = 19111901;
const LAST_CLIENT_VER_ROMS_IOS  = 19111901;

// update url
const UPDATE_URL_TTMS_HW_AND    = 'https://download.thehuawen.com/ttms/Android/TaskApp.apk';
const UPDATE_URL_TTMS_TH_AND    = 'http://download.tianhuajunze.com/ttms/Android/TaskApp.apk';
const UPDATE_URL_TTMS_HW_IOS    = 'itms-services://?action=download-manifest&url=https://www.huawenpicture.com/taskapp.plist';
const UPDATE_URL_TTMS_TH_IOS    = 'itms-services://?action=download-manifest&url=https://raw.githubusercontent.com/shiweiio/taskapp/master/taskapp-tianhua.plist';
const UPDATE_URL_EIMS_AND       = 'https://download.thehuawen.com/eims/Android/EimsApp.apk';
const UPDATE_URL_EIMS_IOS       = 'itms-services://?action=download-manifest&url=https://www.huawenpicture.com/eimsapp.plist';
const UPDATE_URL_ROMS_AND       = 'https://download.thehuawen.com/eims/Android/RomsApp.apk';
const UPDATE_URL_ROMS_IOS       = 'itms-services://?action=download-manifest&url=https://www.huawenpicture.com/romsapp.plist';

// subset id
define('SSID_NULL', 0);     // null value
define('SSID_COMM', 1);     // common
define('SSID_MIN',  10);    // min value
define('SSID_TTMS', 11);    // task track
define('SSID_SRMS', 12);    // staff relation
define('SSID_CFMS', 13);    // cash flow
define('SSID_SAMS', 14);    // sign archive
define('SSID_CIMS', 15);    // customer identify
define('SSID_FRMS', 21);    // file resource
define('SSID_NDMS', 22);    // noti delivery
define('SSID_PFMS', 23);    // prove flow
define('SSID_BRMS', 24);    // booking record
define('SSID_DSMS', 25);    // data sheet
define('SSID_GPIS', 29);    // general portal
define('SSID_ROMS', 31);    // run operating
define('SSID_EIMS', 32);    // equip inventory
define('SSID_CCMS', 33);    // cinema chain
define('SSID_RDMS', 34);    // run develop
define('SSID_BPMS', 35);    // business pool
define('SSID_FPMS', 51);    // fund product
define('SSID_ILMS', 52);    // 天华系统-新
define('SSID_MRMS', 71);    // media resource
define('SSID_WFMS', 72);    // rdms mold

// uniset id
define('USID_SHIMO',    1011);    // shimo
define('USID_XIN',      1014);    // xinrenxinshi
define('USID_263',      1015);    // 263
define('USID_QING',     1012);    // qing flow
define('USID_ATTEND',1016);    // Attend
// subset object type
define('SSOT_NULL',             0);     // null value
define('SSOT_COMM_PORTAL',      81);    // common portal
define('SSOT_COMM_TOTAL',       82);    // common total
define('SSOT_COMM_STAT',        83);    // common stat
define('SSOT_COMM_LOG',         84);    // common log
define('SSOT_COMM_CRON',        85);    // common cron
define('SSOT_COMM_SCHD',        86);    // common schedule
define('SSOT_COMM_USER_PRIV',   91);    // common user priv
define('SSOT_INLET',            101);  // common Inlet
define('SSOT_MIN',              1000);  // min value

define('SSOT_TASK',             1101);  // task
define('SSOT_TASK_USER',        1111);  // task user
define('SSOT_TASK_MARK',        1112);  // task mark
define('SSOT_TASK_GOAL',        1113);  // task goal
define('SSOT_TASK_STAT',        1118);  // task stat
define('SSOT_TASK_LOG',         1119);  // task log
define('SSOT_TTMS_PLAN',        1121);  // ttms plan
define('SSOT_TTMS_PLAN_NORM',   11211);  // ttms plan norm
define('SSOT_TTMS_PLAN_NORM_APP',   11212);  // ttms plan norm app
define('SSOT_TTMS_HEAP',        1131);  // ttms heap
define('SSOT_TTMS_TAG',         1141);  // ttms tag
define('SSOT_TTMS_TAG_OBJECT',  11411); // ttms tag object
define('SSOT_TTMS_CALEN',       1151);  // ttms calendar
define('SSOT_TTMS_CALEN_USER',  11511); // ttms calendar user
define('SSOT_TTMS_SHIMO',  1152); // ttms shimo

define('SSOT_MOLD',             1121);  // mold
define('SSOT_MOLD_GOAL',        1122);  // mold goal
define('SSOT_MOLD_GOAL_NODE',   11221); // mold goal node
define('SSOT_MOLD_GOAL_USER',   11222); // mold goal user
define('SSOT_MOLD_USER',        1123);  // mold user
define('SSOT_GOAL',             1131);  // goal
define('SSOT_GOAL_USER',        1132);  // goal user
define('SSOT_GOAL_LOG',         1139);  // goal log

define('SSOT_TTMS_LOG',         1184);  // ttms log
define('SSOT_TTMS_CRON',        1185);  // ttms cron
define('SSOT_TTMS_SCHD',        1186);  // ttms schedule

define('SSOT_STAFF',            1201);  // staff
define('SSOT_USER',             1202);  // user
define('SSOT_CORP',             1203);  // corp
define('SSOT_DEPT',             1204);  // dept
define('SSOT_DEVICE',           1211);  // device
define('SSOT_PEER',             1212);  // peer
define('SSOT_PKG',              1213);  // peer
define('SSOT_SSO',              1215);  // sso
define('SSOT_SRMS_LOG',         1284);  // srms log
define('SSOT_SRMS_USER_PRIV',   3491);  // srms user priv

define('SSOT_CASH',             1301);  // cash
define('SSOT_CASH_USER',        1302);  // cash user
define('SSOT_SIGN',             1401);  // sign
define('SSOT_SIGN_OBJECT',      1402);  // sign object

define('SSOT_FILE',             2101);  // file
define('SSOT_FILE_OBJECT',      2111);  // file object
define('SSOT_FILE_USER',        2121);  // file user
define('SSOT_FRMS_LOG',         2184);  // frms log
define('SSOT_FRMS_USER_PRIV',   2191);  // ndms user priv

define('SSOT_NOTI',             2201);  // noti
define('SSOT_NOTI_USER',        2211);  // noti user
define('SSOT_NOTI_OBJECT',      2221);  // noti object
define('SSOT_NDMS_LOG',         2284);  // ndms log
define('SSOT_NDMS_USER_PRIV',   2291);  // ndms user priv

define('SSOT_PROVE',            2301);  // prove

define('SSOT_DSMS_SHEET',       2501);  // dsms sheet
define('SSOT_DSMS_LOG',         2584);  // dsms log
define('SSOT_DSMS_USER_PRIV',   2591);  // dsms user priv

define('SSOT_RUN',              3101);  // run

define('SSOT_EIMS_EQUIP',       3201);  // eims equip
define('SSOT_EIMS_BRAND',       3221);  // eims brand
define('SSOT_EIMS_MODEL',       3222);  // eims model
//别名表
define('SSOT_EIMS_MODEL_ALIAS', 32221);  // eims model alias

define('SSOT_EIMS_TAG',         3223);  // eims tag
define('SSOT_EIMS_TAG_OBJECT',  32231); // eims tag object
define('SSOT_EIMS_TAG_TREE',    32232); // eims tag tree
define('SSOT_EIMS_TAG_MODEL',   32233); // eims tag model
define('SSOT_EIMS_SUIT',        3224);  // eims suit
define('SSOT_EIMS_SUIT_OBJECT', 32241); // eims suit object
define('SSOT_EIMS_STACK',       3231);  // eims stack
define('SSOT_EIMS_STACK_EQUIP', 3232);  // eims stack equip
define('SSOT_PREV_STACK_EQUIP', 32321); // prev stack equip
define('SSOT_REFS_STACK_EQUIP', 32322); // refs stack equip
define('SSOT_EIMS_STACK_CORP',  3233);  // eims stack corp
define('SSOT_EIMS_STACK_STAFF', 3234);  // eims stack staff

//需求单相关
define('SSOT_EIMS_DEMAND',  3235);  // eims demand
define('SSOT_EIMS_DEMAND_MODEL', 32351);  // eims demand model

define('SSOT_EIMS_DEPOT',       3241);  // eims depot
define('SSOT_EIMS_SPOT',        3242);  // eims spot
define('SSOT_EIMS_LABEL',       3243);  // eims label
define('SSOT_EIMS_RFID',        3244);  // eims rfid
define('SSOT_EIMS_RFID_EQUIP',  3244);  // eims rfid equip
define('SSOT_EIMS_ALIAS',       3245);  // eims alias
define('SSOT_EIMS_GUEST',       3251);  // eims guest
define('SSOT_EIMS_GUEST_CORP',  32511); // eims guest corp
define('SSOT_EIMS_GUEST_STAFF', 32512); // eims guest staff
define('SSOT_EIMS_RUN',         3252);  // eims run
define('SSOT_EIMS_RUN_STAFF',   32521); // eims run staff
define('SSOT_EIMS_CASH',        3262);  // eims cash
define('SSOT_EIMS_INVO',        3263);  // eims invoice

//合同相关
define('SSOT_EIMS_SIGN',        3261);  // eims sign
define('SSOT_EIMS_SIGN_MODEL',  32611);  // eims sign model
define('SSOT_EIMS_DEPR',        32612);  // eims depr

//盘点相关
define('SSOT_EIMS_OPER',        3271);  // eims oper
define('SSOT_EIMS_VERIFY',      32711); // eims verify
define('SSOT_EIMS_REVISE',      32712); // eims revise
//库区/库位相关
define('SSOT_EIMS_ZONE',        32713); // eims zone


define('SSOT_EIMS_PORTAL',      3281);  // eims portal
define('SSOT_EIMS_TOTAL',       3282);  // eims total
define('SSOT_EIMS_STAT',        3283);  // eims stat
define('SSOT_EIMS_LOG',         3284);  // eims log
define('SSOT_EIMS_USER_PRIV',   3291);  // eims user priv

define('SSOT_CINE',             3301);  // cinema
define('SSOT_CHAIN',            3302);  // chain
define('SSOT_CCMS_ENTRY',       3311);  // ccms entry
define('SSOT_CCMS_FILM',        3312);  // ccms film
define('SSOT_CCMS_PORTAL',      3381);  // ccms portal
define('SSOT_CCMS_TOTAL',       3382);  // ccms total
define('SSOT_CCMS_TOTAL_ENTRY', 33821); // ccms total entry
define('SSOT_CCMS_TOTAL_FILM',  33822); // ccms total film
define('SSOT_CCMS_STAT',        3383);  // ccms stat
define('SSOT_CCMS_LOG',         3384);  // ccms log
define('SSOT_CCMS_USER_PRIV',   3391);  // ccms user priv

define('SSOT_RDMS_MOLD',        3401);  // rdms mold
define('SSOT_RDMS_NODE',        3402);  // rdms node
define('SSOT_RDMS_NODE_LINK',   34021); // rdms node link
define('SSOT_RDMS_NODE_USER',   34022); // rdms node user
define('SSOT_RDMS_NODE_FORM',   34023); // rdms node form
define('SSOT_RDMS_NODE_FILE',   34024); // rdms node file
define('SSOT_RDMS_PROC_FORM',   34025); // rdms proc form
define('SSOT_RDMS_PROC',        3411);  // rdms proc
define('SSOT_RDMS_PROC_USER',   34111); // rdms proc user
define('SSOT_RDMS_PROC_FILE',   34112); // rdms proc file
define('SSOT_RDMS_PROC_SCHD',   34113); // rdms proc schd
define('SSOT_RDMS_EXEC',        3412);  // rdms exec
define('SSOT_RDMS_EXEC_USER',   34121); // rdms exec user
define('SSOT_RDMS_EXEC_FILE',   34122); // rdms exec file
define('SSOT_RDMS_PORTAL',      3481);  // rdms portal
define('SSOT_RDMS_TOTAL',       3482);  // rdms total
define('SSOT_RDMS_STAT',        3483);  // rdms stat
define('SSOT_RDMS_LOG',         3484);  // rdms log
define('SSOT_RDMS_USER_PRIV',   3491);  // rdms user priv
define('SSOT_RDMS_USER_VISIT',  3492);  // rdms user visit

define('SSOT_RLMS_DEFRAY', 34301); // rlms defray file
define('SSOT_RLMS_DEFRAY_CONTRACT_FILE', 10); // rlms defray contract file
define('SSOT_RLMS_DEFRAY_RESERVE_FILE', 30); // rlms defray reserve file

define('SSOT_RLMS_INVEST_RUN', 34302); // rlms invest run file
define('SSOT_RLMS_INVEST_RUN_PROPOSAL_FILE', 10); // rlms invest run proposal file
define('SSOT_RLMS_INVEST_RUN_DILIGENCE_FILE', 20); // rlms invest run diligence file
define('SSOT_RLMS_INVEST_RUN_FACTOR_FILE', 30); // rlms invest run factor file

define('SSID_BPMS_PROC',        3511);  // rdms proc
define('SSID_BPMS_EXEC',        3512);  // rdms exec

define('SSOT_BPMS_RUN',         3501);  // bpms run
define('SSOT_BPMS_RUN_STAFF',   35011); // bpms run staff
define('SSOT_BPMS_RUN_CORP',    35012); // bpms run corp
define('SSOT_BPMS_RUN_SUBSET',  35013); // bpms run subset
define('SSOT_BPMS_RUN_USER',    35014); // bpms run user
define('SSOT_BPMS_FORM',  35017); // bpms form file object
define('SSOT_FPMS_RAISE',       5101);  // fpms raise
define('SSOT_FPMS_BOOK',        5102);  // fpms book
define('SSOT_FPMS_BOOK_CERT',   51021); // fpms book cert
define('SSOT_FPMS_BOOK_BANK',   51022); // fpms book bank
define('SSOT_FPMS_BOOK_VOUCH',  51023); // fpms book voucher
define('SSOT_FPMS_BOOK_ASSET',  51024); // fpms book asset
define('SSOT_FPMS_HOLD',        5111);  // fpms hold
define('SSOT_FPMS_HOLD_CERT',   51111); // fpms hold cert
define('SSOT_FPMS_HOLD_BANK',   51112); // fpms hold bank

// status type
define('ST_NORMAL', 1);  // normal

// inlet type
define('SSOT_INLET_STATIC',    61001); // skip to H5
define('SSOT_INLET_DYNAMIC',   61002); // skip to background interface
define('SSOT_INLET_APP_ROUTE', 61003); // skip to app route
define('SSOT_INLET_OTHER_APP', 61004); // skip to other app
define('SSOT_INLET_SHIMO',     61005); // shimo
define('SSOT_INLET_QING',      61006); // qing flow

define('SSOT_BPMS_LOG',         7101);  // bpms log

//return code
define('SUCCESS', 200);  //返回成功
define('FAILED', 1);  //返回失败
define('M_SUCCESS', '操作成功');  //返回失败

// brch id
define('BRCH_ID_HW', 20); // HW brch id
define('BRCH_ID_TH', 10); // HW brch id
//window, mac, linux, android, ios
define('PUBLIC_KEY', [
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs6oSmY/odvHW2grd3eV9
Ux0sxSzIhjVqn0fXPnPbNBU1QKiYM4eRV5uIXQswyBu97vlvwhTHTcEXOS8j7PVV
RGGxZsJmR+p3OrHPtgqmx0iWWFaPmP21SbSnPSyNb9yvJoxhXWU+zSiZHA7nmpoZ
blQVFgxblTtVRBGCFeXlQGrH1zSsMXTmeulmL/oBlPYxOywXxZToEIO338syNDA9
9ix5LoacOSARp7tXDjsYxW3aKEqrfvUdtly/5t/S361U/vy9OHRpf/Yas/VIQhKX
d4gOIM6/xq3dGBeXx5s7J7JW4rK4E/2pc1U/gbKvAxMCbkzMj1b0bH2BY6Cm6oBK
PwIDAQAB
-----END PUBLIC KEY-----',
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzT/j34b696zGtRD3Np91
huifAo9RG6V1llQAXHsv+GaAuDxNzrthBDMFLP/K5EBL3ajqyjRZm4oDIyo2VgQY
jbai4Akmrk534pNUAqTBcGhDolr6MxBn07k6zwX7TfefQrkiWkHxdxWG9uERmulP
0gJetTo8SmhEQQk4Xj3/HzMVjb0zbn0YXE1yynuVAVnKCjWV/uDV1ykuSEtftyun
u/MuvUtMvXWa+GHQdXb3iY9gzlvdglYgJxZYmdqTmOzBY67Tg/NrI5vXSfx928Yf
XkE06k8MKKH3H7eaWWANsF1zhPW96vVv5EFHFj5wDXpuQBCFcyriLTviHy1vfDzV
TwIDAQAB
-----END PUBLIC KEY-----',
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAyLDxgGZruEle8Vg9W84H
ifa1uFe8mNNfQRYgN/+tFhEhxmqLSm0WZ5h6TrCTbcZHVVPNf/ijY5pEh53rxboh
RRoPY70KyErB5Sp7JQZfvy1q/xBHCc3zaXX02WjWm/eLdCD0SMQc/hK6QyVOgsRg
0e95LHvX36gE5fvYegu7V6kRniYOaQbQ3C0HaTKfuOLcTYKo6u6dkkpBB3JpguUu
pYZy6EbiNzHHGPlJNaXFOxVtCwHNR2L6EoAFHnIxXwuwMexxi9UM31ALF16QLQXF
V0AzR1HXnqSHYbSz0KoSwCN5MYXhLkt/yQYJ6evMFZwbjd+yeNz8JIUIApn4t9vA
GwIDAQAB
-----END PUBLIC KEY-----',
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA35bf5ml8jLTpklEgPhJ4
si3rghK6y7eKSzwBlv/L89fNV9k2gKOLqyszzxKdJuMT3/hjYG26cTenaNFX2vAB
2fa0ph4Es+v8yb8+cIFRfKkHSrYHXaWDIq/0gUhvqnJ8eKPuE5GddBd4U9YZapMf
RYrunJocbxeLqDNkfxtyzE24ziIEWNL4FJOsqNpdc22mglahWJFD7ceinJi7jFPa
7iVt2IIH0g7iD0w8GtRAIdo59VIC1c5NKMyUEkSc0QaP/H0fIYWSUNsEDsUhZrsT
1BewrFDh+Q5DI7oCf1JV38kaLqqjB6nR2pglmkss85O3VwZWXRMsWLuqkXxXfWA2
rQIDAQAB
-----END PUBLIC KEY-----',
    '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvBNhXmS8mFmHI1mZkuiC
O63L5D/aIxizQXLnG660DHY4FaykSkXvyp6d6MoPCwByLD2DP3EpBBeeaJhxZEVS
FwwoPhMi51Rx93XRN3s8KtYamgcojGtkdsYVUdPRIyI3U/0UVHDdpRZ8nmqwGxq3
gayhwb66/GRVs1oKl2imm+L2X8elXgXVsXJ8BM+yG4uQTtYaIWI4NzReFVPSSYNG
EX5WrY48fi0TP7Nb9g1OCrIt/F+3zwHNhUGXZGLJH832aRLWT7wvb0aZkDkavz/C
TLYTYSX+PC4oxpDNEB5CWSAw1qj7HM8o5QJBUeVWMqqYvD0hcaDxZXjGB83ttzoD
YwIDAQAB
-----END PUBLIC KEY-----'
]);

define('PRIVATE_KEY', [
    '-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCzqhKZj+h28dba
Ct3d5X1THSzFLMiGNWqfR9c+c9s0FTVAqJgzh5FXm4hdCzDIG73u+W/CFMdNwRc5
LyPs9VVEYbFmwmZH6nc6sc+2CqbHSJZYVo+Y/bVJtKc9LI1v3K8mjGFdZT7NKJkc
DueamhluVBUWDFuVO1VEEYIV5eVAasfXNKwxdOZ66WYv+gGU9jE7LBfFlOgQg7ff
yzI0MD32LHkuhpw5IBGnu1cOOxjFbdooSqt+9R22XL/m39LfrVT+/L04dGl/9hqz
9UhCEpd3iA4gzr/Grd0YF5fHmzsnslbisrgT/alzVT+Bsq8DEwJuTMyPVvRsfYFj
oKbqgEo/AgMBAAECggEAXxEhImyJf1bcbyfM2ntyYyZO6E6YFJvzPTEQbhVz6g1G
zl3nm2yitY6xCzq+p0Q2rlsCjdnc1AHWPgX5porygWqIKm23HVqtmDs6Q4NDWLPK
ChhTh4rIAKY80BvhA03syCMD6h2Gq5xN2BDy8FWWG1EWj0Ieu8pXhdsV0GyDcB+t
ZjR553+mYqhYUum7zdRAXV0nVuRzQDh3OoHIjUILAngHmOgZsckkibonyeNmHKJf
C0T6Fuo5Sjs0xJd6MhMsbh2QuiPY8unlbMUpZdsBgjVXRAwZDlxLleYgUnMa1819
v3+iwCcxUriimSRha8r2T67xUouHIVNxe/NXVbVksQKBgQDdfRer3g+SQ8a4jWHp
2H6FAYkLn7THRFZ5TBS7YGIw7MwHNhTN2maX2Mq+5GjVGZzMUFks/+drkslOPx8K
ReBUaqsIjuLJbpb7Krvf1SnEHfa7qrMH9H7Gjet3j2txugnjINIa+88HA8uVrXE1
srS+Lih6bvRm0Tx+6yrqGgX7pQKBgQDPqKkseLVxBLlx8rhY/4Mg5XQuF0oxzRvm
fEJoe8KmnLfC6rN9EDOEF7zsLCj9jgS7W4I/w123qFGtCgmy/S9FOW31ZEZ3ZqyP
W1FATZOQ21crRDHMJfJ7BlufDmSTJc/cl5Exr1r2DBH8+Bi0iF3lj8ldWepjWCzO
U7/f+bWZEwKBgQCUDaplGGsQOn37n4Zz6mOoRP525qrRCL1FF7ZEComYarF3oI8H
i5ZIqoHcWJI64IQPjyYNDoKDRfuKcmctVsg9pY/uiJTQUTxbaJVtafAhSGZFzDUg
fC7CStu7cANCYjl5uda4ctpQthjAVM/4NRzcg75LGSAGGpd1v31QP1UAgQKBgGsK
b5ni5vRJESZxjSEjJH6yiD6x9qbRKY6XgsvE78NeiULKJJdU4Jk4e0PqR37b1AiX
1P31QLvI4cEmqXVAGTu/rLSPadtma5DB65IP6v8CcV52Go03ClTsJBJLIwDOvuTg
pBFOaL7n3eXeJS36FRyeD5g1HyLycrYwaXmUiE1NAoGAcwup4Y6Hiu0T3sZxBOMg
r1YR6qohc/pmNJvsf9sL3P45kKDb+Bbe6us2lM41aCZTRTElO1Q40/V1w5xG+se5
mr5T07NfUtY1unA3FaBUvQYkaX6QXcyKUjnMzAEBgaaa2u9ycNOJbyI/ysyycgWH
oeRs4ohhUG4Rmm07sTTxd18=
-----END PRIVATE KEY-----',
    '-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDNP+Pfhvr3rMa1
EPc2n3WG6J8Cj1EbpXWWVABcey/4ZoC4PE3Ou2EEMwUs/8rkQEvdqOrKNFmbigMj
KjZWBBiNtqLgCSauTnfik1QCpMFwaEOiWvozEGfTuTrPBftN959CuSJaQfF3FYb2
4RGa6U/SAl61OjxKaERBCThePf8fMxWNvTNufRhcTXLKe5UBWcoKNZX+4NXXKS5I
S1+3K6e78y69S0y9dZr4YdB1dveJj2DOW92CViAnFliZ2pOY7MFjrtOD82sjm9dJ
/H3bxh9eQTTqTwwoofcft5pZYA2wXXOE9b3q9W/kQUcWPnANem5AEIVzKuItO+If
LW98PNVPAgMBAAECggEBAMkgy482OWZNI+c4+dfICKYr++3JPSTHTeQC6tu1R3u2
Dnr7dQ+ZZOd1i6PeARcMvos2xOViyVB2vL5P1jESEHGGQDMkJIh4klgwIQn6Iyig
s248kqNJd0TtZWiLJwjvF1yOCNDDf/g+2yO/x72y1aoo8l/K8lvDsua8P0VyoTcS
2dCHCfO+lY4j1Uw4AH8KFpR2kaILIjzLBL3blZN+BqeSKqTMnqnABR1xzI6Ig1u6
MJxC204mxeYiN+yvR6cv+r064v3RYd8YFaEkcctq1tX2PxcPVVseqBA3PFQITF9l
NWxs59dGBTVsY+vWlYCAttJXF8ZPbeCvGUt4LXKK4pECgYEA5sXAcTEB8HZiN5/g
TNXNWaqyUwdcyMqfp9RLhVTSTa/uhiO6qAQ8xUQ0XmRUFY3SKjRTQINu6ohcA6L8
cvasj+UdWfgF1lnSpC9DQARUn0DXuPIL3ShjTaaii/V/hARMG7cg7u8J9EnjhVbn
cTiEZNGgYYXJ6QlXObrDoc2WbYcCgYEA46/fBwoZsPMxBTdt2RLV6ShmAZgaK+UO
d87lcEQswM9I3b+bzJCA/oBG7v1/8iFxVoOBbQJnG4vjcRNdTY+Pjjq2SnA9/iaG
n2S/aJUhO4xnieyjCvzM9TlSPBpsmsAZqbj9bFgN49x3s6zTY3bLG5esCHboNqS0
WUNhp+nsi/kCgYAgSGmza/epe+YhgewO05n2gTqRAuan8DCFed1WuZbx5zqm6Tij
aHRX5EKvMbnRihVscgVzcO+DP7Afkh1et8NMHfENNPUcF1SwQyxVOEXeQWPsK3Ad
cBj0M+tpSN6dyTwcZHHm+umZkvyRGqcl35IlyG13NxAX2YaqPMZBTFFO4QKBgQCI
/Xz72Eji3T9GOzZdX+bSNNtC5EgC1vsgfJwxMuOWUmEuAiX0K5FhDr8e9ejwPszZ
V6AcfVCaE02R8Cu4CcM+uPaKzQOPkZB4AH7lpqxrDqwRIQ5sAvQyKv3eaaukZCZM
pp/bexNIYJKoyTgaZRQJEvWP1jMbBXf5KQBtreIDyQKBgDhsqJXOJ0W1GIZhld0Y
v25o4fwywQfyEIUVfIgA+1gyDdBgAK+nqgS4c5ntwcM2KWqDzwlXLerNBT68SpaR
3tmHoFRdh5PRrd83PQBhzjsidyzZpY++X2OsWNsQjIqBwWJbGdNQLdxXfY+sG00F
YfEDPuZH8dvVG/ZsvHBnw7+H
-----END PRIVATE KEY-----',
    '-----BEGIN PRIVATE KEY-----
MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDIsPGAZmu4SV7x
WD1bzgeJ9rW4V7yY019BFiA3/60WESHGaotKbRZnmHpOsJNtxkdVU81/+KNjmkSH
nevFuiFFGg9jvQrISsHlKnslBl+/LWr/EEcJzfNpdfTZaNab94t0IPRIxBz+ErpD
JU6CxGDR73kse9ffqATl+9h6C7tXqRGeJg5pBtDcLQdpMp+44txNgqjq7p2SSkEH
cmmC5S6lhnLoRuI3MccY+Uk1pcU7FW0LAc1HYvoSgAUecjFfC7Ax7HGL1QzfUAsX
XpAtBcVXQDNHUdeepIdhtLPQqhLAI3kxheEuS3/JBgnp68wVnBuN37J43PwkhQgC
mfi328AbAgMBAAECggEBAKyAAqS15EMbtaLGkL73QV2hlCKmLzJBBLACH6Fif1jn
UtukOqO3TjmvQvmeJqqFckzyYkFr6qyzLdJPuBdVXEF0G+RD2h+8uhqLQBvb9bJy
jHQ+foD76Awu2k2BIm4fAVvI85AUGUN9v2H1kB0wRHROXR4SOMRCPCueJD0LFnVK
FCiceM0zPFBDo3H4UqF9vKBL890P3L9CW3zGTflVoJtmhabHeQYKw9nN/9oxolMG
s3x1L2LYdmXzC6p0+Gem/z/FMiIEtzaM6djX1s7RDRePSvroO54X6CgQPj4kiy22
d+5oW4DpE4/noGbvEKyOyV4glftdK4BsNtkgbP9VFmECgYEA6772Do0rgm1x7aOr
9yvHaUGIHEk0ZxjiEONpQEaOpa7u8CeOaVOhiTwy1WfLd/gdrY/hs37cWYBq+Nm2
WEaH6o04UxIz58yySqD7VM9LAEsXnNAM+YC6raLLFphUg04MdN0mYtySuJ44hJs2
aeToF5RusLhkFCO8oD0XawvNF6sCgYEA2e77RqtQ4+IFrtElw/grxwoRPoK1Gdxx
FBBXMBmBd8Hkd9zXgOA83z8Y+7aKnEeOwvhwU6Bcl+p41tqaA6zvFVaET4YOFOI+
RxnUcXUGkaeeCiWdpd4E3xXz7KOfklpfmGM5LbhZXyteujL5t6qKeoBqT+xUyowJ
6ymZKFMmyVECgYEAkErMrjFn7Sfx8KMaUWpBXsJWfgGsimHnlLCsrkPBcdW1t9Zu
Szd+CtKGxqoGFsMN3zrOyZ+fXUTFtNUEz9kzvbN8QxREIt/eTOFllA5g+Kf9puSM
3HYXTMn0hjrsl4XBCBKIOUCKqWdmbnvV/VC3Yh9e9NmXn+ATxvw9hi6t9IsCgYEA
1o4SMlPtUj0uTRq5bILCTrWZnoo+U5SUeyVPQRqLPOTV0i/ItqeNJljPdtkTA6Lr
aQYASESDhEih6RzULjQuOTqxDj2zVVob6BIE9iI5cmKsE99OooK/FwZc3CeGrSZu
IO/m1h09V5WyL+yJrwmmRc5xW/gWzkYqaavNjka209ECgYAY6Hgw8At2qxCOafV3
8d3v+XrpqmxAOQlMdrEItPRjhOULcomoMOkMYEAF0N2zzylj3S0rFFHxdbV4AZzB
6bq6MnrvWMXWL/3Brx37YUuM7KE/xBte2/g7UMhfXokAak4Ph3xK170GTB7tgMiV
wyoP/s5ukacPk6/UGNIwkdQtPw==
-----END PRIVATE KEY-----',
    '-----BEGIN PRIVATE KEY-----
MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDflt/maXyMtOmS
USA+EniyLeuCErrLt4pLPAGW/8vz181X2TaAo4urKzPPEp0m4xPf+GNgbbpxN6do
0Vfa8AHZ9rSmHgSz6/zJvz5wgVF8qQdKtgddpYMir/SBSG+qcnx4o+4TkZ10F3hT
1hlqkx9Fiu6cmhxvF4uoM2R/G3LMTbjOIgRY0vgUk6yo2l1zbaaCVqFYkUPtx6Kc
mLuMU9ruJW3YggfSDuIPTDwa1EAh2jn1UgLVzk0ozJQSRJzRBo/8fR8hhZJQ2wQO
xSFmuxPUF7CsUOH5DkMjugJ/UlXfyRouqqMHqdHamCWaSyzzk7dXBlZdEyxYu6qR
fFd9YDatAgMBAAECggEAQCK4IRDbMEVoxpbMx+Fmi73OU2Zp/KuuWLxivFyttUmO
1ocxMh83nibrWpe9Sn1SoylN4Eg5deZ/9/os2FmGPm6dDRWJRc8ImRppn74IkNiv
hcfHPx6OCjIs0bTkiyECAV0MmsJnRvjAhFPiwIZpLvqWTYeLZnZ7kgkD584I1P9h
DRLZ8jetn4Il8oMnhRiWOoO6pqmnhqY6ar1drKQTqkfUfqYVof0aJrasopG1NyYb
xkboDVBPAHVwpWVXLI2GpsCDT6zPttv7828xkoS4HJ4aW5vPcs4WNalNQwoH7t+V
gfClTNhDfxnBebB9PFQ6qGUAzW+3Aeb0n9C0CG3a4QKBgQD4QRX7AQwvVxhJ+KWA
/4HuLONXOxCEQDKNyzuNYAmVyEz75S+loWWBKvFtaZRD1R7sL6UpVstTeuzZ6lJa
9w8UJcIeKyKnC0olZjQEGntKTRc44/1bMoc8M+zW7swV01X0NqO2QWVEYjP0xFtw
+Pat+1EDDEd3AXZNj1KnR+2ySQKBgQDmkMeUbv/3nCKea5zOEa5QLxN8hdaCv4Uw
Qg3FB8HQ7dsvctEevYpzX7FpWIaRuq1KzFor+c/BMioQpQMKR2OwBKkw3ftS01gn
iPHJZyBqvkX5JDPyNgyr5FQOE9Ya4xlqcgNCKijuYgAXrXqHAia9R/Cgx+4rOKik
pBLJC7XhRQKBgQC/jECwfntvX40/LhpNcVhIdNwpJ0q0MHCRVZmqmMpshrNXvNvJ
ucF/K6pC2K7ss9l7NbwDLJQP4o40CgfnZi99RTEFZBUFvMFGIBjMfb5ZcygS3l9T
aaZM/mek43YW9QyiNTKWYtkHLZqXJpbDkWWMkphMeMH/geJNL+P/bJFr+QKBgHNB
opMf3dLweRnKX6tfiUzKC6qu2OmpRbI3At0goJGJpY0Vj1YXl/NOvcgUmciVkfUX
LGhZS7KfGgoSAvALedjOq6ki/nSL88Bno75zT/AsR5xgrZsBy9nNnPsgjWIJbnYY
ompb2vQ3hyZO8TY2LBlosfAdoYB3pU4QOtfHg9clAoGATm8gh7QW3WfXbMGkv/gc
Evj8BwzOZu4I3xjU65C78iG+qZ/JSirUeAfbkaGQKhcmWoaXp/SzNIDVKAz0QO+P
iBXeAJDhOh7xh/bWd6Z772bHnOrgrljhvY5N71ohaGe9rQ6EO6NtMsK9OgsXeILy
w/hDW2L76PsPYahRa1vTxho=
-----END PRIVATE KEY-----',
    '-----BEGIN PRIVATE KEY-----
MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC8E2FeZLyYWYcj
WZmS6II7rcvkP9ojGLNBcucbrrQMdjgVrKRKRe/Knp3oyg8LAHIsPYM/cSkEF55o
mHFkRVIXDCg+EyLnVHH3ddE3ezwq1hqaByiMa2R2xhVR09EjIjdT/RRUcN2lFnye
arAbGreBrKHBvrr8ZFWzWgqXaKab4vZfx6VeBdWxcnwEz7Ibi5BO1hohYjg3NF4V
U9JJg0YRflatjjx+LRM/s1v2DU4Ksi38X7fPAc2FQZdkYskfzfZpEtZPvC9vRpmQ
ORq/P8JMthNhJf48LijGkM0QHkJZIDDWqPsczyjlAkFR5VYyqpi8PSFxoPFleMYH
ze23OgNjAgMBAAECggEBAJ1P1JSgzALed6OA0WzI4A3M7AspwWqzwVQQKPDFq0H1
LCos8mpRnyWqkMhjIjwAjn8koIBTRYxvuQch406MkQJIH+z0ErDNuFnVCT9P696k
oTGOpUL2nNygCLsd4gNyHjc5K2UJ1sq8SVY0RMMXEMD9RXuJ7lsoDWrr+In2dc1S
lcKk4MIgu5DjhwHxVb78bH92aVCfOvilueYQ7VxrNJgVNI2xI/6joklL7QSg6mlc
mFAfzEWiDfd+B6DjDbsP/2YJPDyxsGFblGVlbLIvwrVe4oR9z1zRDCkaG/KDvCzI
ublg3KqA1IxCYSxqmvdpPE3jv7rXOdh6Wl6Kx9rPypkCgYEA30GVQplc7wfeDnAy
lL6Kq54EB1iUoQ4SxapMqktBRfeWnCGV8T9s79XObyKPaKqBeAU6dR+Mq5aCs6Tb
0i9we3q4neII5PpgHQXBazXGGDJN8t41srJ9NrNdaybH5hpQ1DlGkjIt0/xvLj3A
aFhOjsHw6gYeh+IHxnInzlFr/EUCgYEA16jnmOKWiii+6YuznKiw1PGXJbUY8uew
1Wo+g26MHoaDe3yyCxaqDclsq0FtBdYRXeEtTO8n7bfwBLNeJ48CWccprHKfeuFq
Iyaizw6mYFfd8JJBR5kZvg3iiKM3rxquxYS1qchD8Zp47Lln0lUDgAvUNz1ftdG/
me057wIXP4cCgYBT/gh5ldkw1HTmWa+t5kGlbz10xg6kyPanBvrw1n8oI422D6yp
poMFeBrCFO5/IiazUMQ9bDEwHN/vVgadfNuEmRb7zx4ph0jBoniyLPjqAYLx7Een
gx84hSKQPXbXSu896I50UgyLxFzPuMu6df6YFr7cTJEP7imerzPqmxdVQQKBgQDO
SOI/e35D6XW0L80+rJ15Ex5hEzkqIDUl7tqdHcEp8cES/dPQh31icqlfptWCH6G9
Cwcp8BlhafBMjsYhUMoO1lMmgP3LrJK5zNsu8/Rxc5r34u5ObkQRZ3ao/HbnJ77F
cIvUO5vCHuBMj4yfxHH0qVv0+t/yKw/7TM99r6JNQQKBgCLB0TGlfL6i0hWjd8B3
REWioKML9FDwF9dTs6bnn1q7IL5Oy8yW6xvsM+lwKr8nzlOoB3U9n19hZbzPO9aS
bW7CiSkn1Mp8QIU4QlOSewDsAvPpxMdePZ/Ugm6JthoIrsgBV9gJK6hQ1xb+JbRh
isG7mcsI6l9rmqY2fzPYyX0X
-----END PRIVATE KEY-----'
]);

// 支持的第三方登录分类
define('THIRD_LOGIN_CHAT', 4101);  // 即使通讯，暂为腾讯IM

//var_dump(get_defined_constants());