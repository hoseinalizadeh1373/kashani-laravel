<?php

namespace App\VTiger;
use GuzzleHttp\Psr7;
/*
 * This Source Code Form is subject to the terms of the Mozilla Public License, v.2.0.
 * If a copy of the MPL was not distributed with this file,
 * you can obtain one at http://mozilla.org/MPL/2.0/.
 */

class CrmMethods
{
    private $api;
    
    public function __construct()
    {
        $this->api = new ApiCall;
    }

    public function me()
    {
        return $this->api->call(
            "default/me",
        );
    }
    
    public function describe()
    {
        return $this->api->call(
            "default/describe",
            [
                 "elementType"=>"Contacts",
            ],
            "GET"
        );
    }
    
    public function getContactByNationalCode($nationalCode)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where cf_pcf_irc_1122 = '$nationalCode';",
            ],
            "GET"
            ,null
        );

        return new CrmContact($contact[0] ?? null);
    }

    public function getContactByContactNumber($contactNumber)
    {
        $contact =  $this->api->call(
            "default/query",
            [
                "query"=>"select * from Contacts where contact_no = '$contactNumber';",
            ],
            "GET"
        );

        
        return isset($contact[0]) ? (new CrmContact($contact[0])) : null;
    }
    

    public function uploadDocuments(){
        // id hossein 12x227595
        // field name file_8_1
        $base64="\/9j\/4AAQSkZJRgABAQAAAQABAAD\/2wCEAAkGBxMSERUSEhIVFRUVGBgYFRcWGBcaFxYZFRcYFxUYHRcYICggGRolGxcWITEiJSkrLi4wGB8zODMtNygtLisBCgoKDg0OGxAQGy0mICUtNy0wODAtLystLS0tLS0tLS41LSstMy0vNS0tLS0tLy0vMS0tLS0tLS0tKystLS8tLf\/AABEIAOEA4QMBIgACEQEDEQH\/xAAcAAEAAwADAQEAAAAAAAAAAAAABQYHAwQIAgH\/xABHEAABAwICBQcHCAgGAwAAAAABAAIDBBEGIQUHEjFBIlFhcYGRsRMyQlJykqEUI2JzgrLB0RYkJTNTVMLhFRdDY4Oik9Lw\/8QAGgEBAAMBAQEAAAAAAAAAAAAAAAMEBQECBv\/EAC4RAAICAQIEBAYCAwEAAAAAAAABAgMEESEFEjFBEyJxgTJRYZGhsdHwFSPxFP\/aAAwDAQACEQMRAD8A3FERAEREAREQBERAERdXSekI6eN0srtljd58ABxKHG9N2dl7gASSABmSdwVP01j+CK7YB5Z3ODZnvcexUfE2K5axxFyyEHkxg+dzF54no3D4qGYFVsyNNolKeU29IFlrMZVkpylEY5owB\/2Nz3WUedITuN3TzHrlk\/8AbJcNBRSTG0Ubnnjsi4HWdw7Sp+nwZWEXLGt6HPF+4Kq\/Fn01PC5pfNkTFWSjdPMOqWQeDlLUWJauPdMXjmkAcO\/J3xXM7BtW0X2GHoDxf4hRtXQyQ\/vY3M6XDk+8MlFLx4b7kiTj9C56Mxsx2U7Ng+s27m9o3hWqGVr2hzXBzTuINwe0LIWtUjojSMtM7aiN2nzoz5run6Lukdt1JTxDfSz7k0ZtdTUEXT0XpJlQzbYehwO9p4ghdxaiaa1RMnqERF06EREAREQBERAEREAREQBERAEREARdOu0rBDnLMxntOAUNJjugBt5cHqa4jvAXuNU5dE2eJWQj8TSLI5wAuTYDeTwWJ4zxM6tmIaT5BhIjHrc7z18OYK\/aX0\/SVlO+COtZEZBa7gb24ixI37lRdIYFqYm7cexOz1ojc+7v7lDfCcVo0yllTlNaQ3XfQgIwtEwtgTaAlqwQDmIgbdW2R4Dt5l8auMMX\/Wp2EWNomuFsxkXkHuHatHUNdK6yPWNRtzSOKnp2RtDGNa1oyDWgADsC5URWS8F8vYHAggEHeDmD2L6RAVHTeEW2MlKNk7zF6J9n1D0bupVhjd4IIINiDkQRvBHBaqqti7RIsalgzb+9A9Jo9Lrb4XWbm4anFzgt\/wBkUo6bogNG1joJBKy5G57R6bf\/AGG8d3FaJTTtkY17DdrgC0jiDmFnDApzD2l2wB0chOzfajs0m20eW3Lpz+0VV4dl6Pw5vbsdWxb0UP8ApJBzvHXG\/wDJdul0tBJkyVpPNex7itmNsJfC0\/c98yO6iIvZ0IiIAiIgCIiAIiIAiL5e4AEk2AzJ5gEBw6Qro4I3SyuDWN3k+HSVk+JdYc05LKe8Mfrf6jh0n0R0DvUbjnE7q2azSRBGSIx6x4vPSeHQq40LZxcOMVzTW\/6MnIy3J8sOn7Pp7y47TiSTvJNz3lArlh\/V3UTgPmcIGHcCLyEezkGjrPYrdT6tKNo5Rleecvt90BTTzaYPTXX0K8cK6zfTT1MgUlonS89O7ahlczo3tPW05FWh+GtGzPdFT1pjla4t2JRkS0kEDaDS7dvBKr+m8PVFIQJmZHzXtN2O6jYWPQbFeq8mm7yp+zK8qLavMvumaNhLHLKkiKcCOU7iPMk6r+a7o+Kt8sgaLuIAG8k2C89MUhW6TmnsJpXvAAABOWQ5txPSqtvD05axeiLtXEnGGk1qzVK\/HFHGSBIZCOEbdoe8bN+KiJdZDb8imeR9N7W\/dDlnYX2FJHAqXXcgnxK59NF\/fqaBHrHF+VSuA+jICe4tHipWix1SPycXxH\/cbl7zSWjtKyxpXIAuywKX02PMeJ3x66P2\/g3GnqGSN2mOa4Hi0gj4LkIvkVilDVyQu2onuYfonI9Y3FX3DuNGyERVADHnJrx5jzwB9V3wPwVC\/BnXvHdGjj8RrtfLLZ\/giJqXyMj4eDHWb7B5TO4ED7JXIwqaxHoaZ8wliaHBzQ1wLg0gtJsc94zO7PLcUpMKuteWax9WMCw+04Eu6wG9S+Qv4bbO6XIti6tttCGcV1pWg7xdWt2FYuEkoPPtA\/AghRWkcNzx8qMiZvN5sg\/pf\/17VG+F317rR+h1v5o6dBpyaAgA+UZxY852+i\/eD0G46t6umjNJR1DNuM34EHzmnmI4FZw59\/x4EHmI4FftDXvglEse\/c5vB7fVPTzHgrWJmzg+Szp+UeFLTp0NSRcFFVtljbIw3a4XH5da51uEwREQBERAEREAVJ1q6aMFKIWmz5yW9IY2xefi0faV2WM63KrarwzhHE0W6XFzie4t7lawq1O1a9tytlz5anp32KY1ajqywqNkVkzbk\/uWngPXtznh0dazfRdN5WaOP13tb3kX+C9GQQhjWsaLBoAHUBZX8+5xioLuUsKpSk5PsciIixjWPOuII9mrqGkbppe7bcR8LK5YA006d3yCp+die12zt5uaRnYHqv1WUPrKovJaQkNspA145sxsn4j4qH0FpA09RFN\/DeCelu5w69klQJuMtUYMZOq5+u\/oS2JNCuo6h0RN2nlRu9Zh3X+kNx7+K49EaKmqX7ELNo8Tua3pc7h49C17TOgqeuYwyXIHKY5hsbOHON4OS7ujNHR08YiiaGtHeTzk8T0rb\/yOla2834LH+NTsb18v5KnonV5E0A1Ehkd6reSwfie3uVjp8O0rMm08Y+zfxUoioTvsn1ZoV49cF5YojZtA0zxZ0EZHsj8FCaSwHA8Xhc6J3vM908OohW1EhdZDo2dnRXNaSijHtL6FmpXWlbkTyXtzY7t4HoPxXS2bixW01NO2RhY9oc1wsQdxCzDE+gTSSDZuYnnkE72n1CfA8Vq4uZ4nll1\/Zg53D\/CXPX0\/RNYLxIQRTTOuDlE877+oT4Hs5leliDj\/APf351qWD9LmppwXm8jOS\/pt5ru0fG6rZ2Oo\/wCyPTuXeGZbsXhz6rp6E6iIs41is4u0JttM8Q+caLvA\/wBRo3\/aHA9iozn33LXiFk+lqfyU8sY3NebdRzHisvPpW1i9yCxaMseANIWe+nJyI8ozsIEg7y09pV2WU4cn2KyB309k9Ika5ni4HsWrK1hzcqlr22PVT20CIitEoREQBERAFh2tFhGkpCeLYyOrYA8QVuKynXLo8iWCoAyc0xOPMWkvb3hz\/dV3Alpdp80VM2OtXoynYYkDauBx3CRvivQ68zRuIIIyIzHWNy9BYU0w2rpY5Qc7bLxzPbk4fj2qxxKD2l7EGBNbx9yXREWUaRRNbGhvK07ahou6E8r2Hb+42KyNhXpSWMOaWuALXAgg7iCLEFYRjHDjqGctsTE4kxO6PVJ9Yf3UVke5lZ9LT8Re5etWGJA+MUkjuWwfNE+kz1etvh1LQF5tglLSHNJBBBBG8EbiOlaxhHHrJWiKqcGSDIPOTH9J9U\/BchPsyXEyk1ySL0i\/Ab5hfqmNAIiIAunpbR7aiF0T9zhkeLT6Lh0gqBxDjGOIFkBbJJuvvYzrI849AUPhXE8vlwyolL2yZAu2RsvPm7gLA7u5Rf8AojGainuRSsg\/KypTRuY5zHizmEtcOlpsezJTuBdIeTq2tJ5MoLD1jNvgU1gU2xWFw\/1GNd2jkn4Bqr9NPsSMf6j2u91wJ+AX0211Pqj5pJ4+Tt2f4\/4bki\/Gm4X6vnj6oLK8Vyg1k1uDgO5oBWk6Vr2wRPlecmjvO4DrJsFj00xc5z3b3EuPWTdUc6XlUSC6XRHc0KL1UA\/3Yz7rw4\/ALYFl2BKQyVrXcIWueT0uBjaO3acfsrUV7w46V+4o6NhERWycIiIAiIgCh8WaFFZSvh9LzmHmc3Nv5dqmEXqMnFpo5KKktGeaJoXRvcx4LXNJDgd4I3qbwniSShl228pjspGXycOBHM4cD0kLQ9YGCflX6xTgCYDlN3CQDd1OHxWRyxOY4se0tc02IIsQepb1VsMiGj90Yllc6J\/pnoHQmIKeraHQyAni05PHW1Si82RSFpDmktI3EEg94UzT4trmCzaqX7RDvvgqnPhr18j+5ajxBJedfY3klQlf8jr2vpjIyQ77NILmkekDzjoWMVunKmYWlqJHjmLjb3Rku3gytENdA85Db2T1PBb3XIPYuPhzUG29zy+IxlJR5dns9T5xNheaifZ42oyeRIByTzA+q5RDHL0bUQNkaWPaHNcLFrgCCOoqhad1ZxuJfSv8mf4brlnYd47brFnV8hbhSi9a+hSNEYgqabKGZzW+qeUz3XXA7LKz02sepA5ccTjzjab+JVcr8J1kHnQOcB6TOUPhn8FHOie3zmPb7TSPEKFucSKNlkNt0XiXWLUEcmKJp5ztO+FwoTSOn6moylmcW+o3ks6iG+cPauoaJrnea1x6gT4KXoMPVUvmQP63DZH\/AGUcpWy23JlOU\/qdRrl93vkrponV7udUyfYjy73n8O9V7EeH5KN+d3RE8iTwDrbneKjljziuYkcJJatEnS6Uhq4m09aS17Moqjj0B5PZe+\/rUfpPB1U1p8m0TNIOy6MjO45iVChy7FJpCWL91K9nsuIHaBkVexeK20rle6IbKq7fiW\/z7m2RjIdQXV0lpOKnbtSvDRwHE9Q3lZTJiSrcLGpkt0bLT3tAPxUbJMXHacS48S4kk9pzKilmLsi48j5Im8T4hdVvGRbEw8hnOd227ptkOa551COeuMvV6wbhF202oqW2tnHGd9+DndXAdqrRhO6erIVzTexOYJ0Oaenu8Wkl5TucC3Jb2D4kqxIi1IxUVoi7GKitEERF09BERAEREAREQBQeIsKU1YLyss8bpGZPHbucOggqcReoylF6xZ5lFSWjRkmktWFQzOGRko4A8h34j4qGkwVXNNvk7j1EEeK3RFcjxC1ddGVJYNT+aMA0ph6pp2CSaIsaTYE239NtyjF6AxDoltVTvgdltDkn1XDNp7\/xWB1dK+KR0cg2XsJa4cxH4LRxMnxk9eqM3MxfBa06M3DBenBV0rHk\/ONAbKPpD0up2\/t6FPLBcL4gfRTCRvKacpGesPwI4LbdE6UiqYhLC4Oae8HiCOBWZl4zqlquj\/uhp4eSrYaP4l\/dTur5dGDvAPYvpFTLh8iMDcB3L6REAUfp2tihgfJMA5gGbSAdsnINsd5O5dqsqmRMMkjg1rRck7gsixfiY1klm3bCw8gHe4+uRw6BwVnGx3bL6dyrlZEaYfXsSA0ZQ1WdNP8AJ3n\/AEZvNB5mneOwuHMAuvPg2sbmI2vHAscDfvsVV9+Vr9G+54Cy2bBuiHU1K1shPlHct4vcNJ3NHULDruuZvDqa1zJ9SniT8dtNaad1\/BnDcMVhy+Tv7bD8VJ0OAqp5+cLIh0naPc38wtRRZ6xoIvLGj3ZX9A4Qp6Y7djJJ677G3stGTevf0qwIinSSWiJoxUVogiIunoIiIAiIgCIiAIiIAiIgCIiAKl4\/wh8qb5eEDyzRmP4jRw9ocO5XRFJXZKuXNE8WVxsjyyPNrmkEgggg2IO8EbwQu\/ofTE1K\/bheWniN7XdY4rWsWYKirLvbaOb1wMndDhx696yjTOH6mldaaIgcHjNjupw8DYrcpya746Pr8mYN2NZRLmX3RoGh9ZsTgG1MbozxezlM6yPOHZdWemxVRSC7aqLqc4NPuusVgwK\/VHPh9UnqtUSQ4lbFaSSZvc2JqNgu6qh7HtJ7hmVXtK6yKdlxAx0zuBI2Gd55R7B2rJgV+7S5Dh1ae7bE+J2teVJE1pzEM9W68r+SDyWDJg7OJ6SozaXNozRs1Q7ZgidIegZDrccgOsrTcK4DZARLUFskozDR5jD2+cekqa26qiOn4RBVRbkS1f3Z0dX+EiC2qqG24xMO8fTcOB5h2rQ0RYd1srZc0jfppjVHliERFEShERAEREAREQBERAEREAREQBERAEREAREQBfMjA4EOAIO8EXB7F9IgK3pHA1FMSTFsE8YyW\/AZKEl1XQHzZ5R0ENP4K\/op45NsekmQSxqpdYoz+PVbD6VRKeoMH4KXoMAUURBMZkI9dxI7tytKJLKul1kzkcWmO6ijjp4GsbssaGtHBoAHcFyIigLAREQBERAEREAREQBERAEREAREQBERAEREARFkGnKp4qZhtu893pHnQGvooDA7y6jYSSTd2834qfQBFUNY8hbFDskj5w7iR6B5lCYEmcasAucRsuyJJ4IDSkREAREQBERAEREAREQBERAEREAREQBERAfPlBzjvX6DfcssxpRGCqdYnYl5bczvJ5Y9657VN6t9KX8pA4\/TZfucPAoC8oiID8LgN5X4HjnCzTHulvKVPk2nkwjZy4uObj8GjsPOu9q50eXvdUOvZvIZe+bj5x7Bl9o8yAvpeOcd6xbED\/1qb6x3iuXE0Mxq59lkpG2bWa+3ZYKDe4gkG4PG+\/tuug17AMg+RMuRvdx6VYg8c471gsUcpF2MkI52tcR8ApnCkMwrYNpkoG3mS19tx33C4DVtKaNhnaGzN2g03HKc2xtb0SOC6+jtBU0L9uJgDrEX23HI78iSoLWY+0MOdvnD9xyg8ASk1gzPmO49CA05EVBxPjN22YqY7Ibk6TeSeIbwA6d54W4gX5fPlBzjvWLvq5ZTm6R563OK+vks38OX3Xfku6HDZvKDnHegeDuIWKTB7Mnh7b7tq48VbdWj7yzXN+Qz7zlw6aAi+XvABJNgMyTuACz3T+OXucWU3IYMvKEcp3SAfNHx6kBoi+fKDnHesWdVzSnN0kh45ucfgvr5NP8Aw5fdcunDZw8HiF+k23rMsFwSitjLmSAWfckOA8x3OrPrDdakB\/3G+Dlw6WXyg5x3p5Qc471iAmccgSeq6+7Seq\/ucunDbQV+rEPlD2He9p4ZuCtGFcXSNkbFO8vY8hoc7NzSchnxbfnXDpo6IiArOP8ARnlqUvaOXFyx0t9Id2fYsz0JpT5PPHNwaeV0tOTvh4LcXtBBBFwciOcFYTifRxpaqSH0QbsPOx2be4ZHpBQG6xvDgCDcEXB6DuXS05pEU9PJMfRGXS45NHfZQWrXS3lqQRk3dCdg+zvYe7L7KgNa2meWylafN+ck6zkxvdc9rUBUGvfLJYZvkd3ucfzK23QujxTwMib6Iz6Sc3Hvus21X6K8rO6ocORDk3pe78hn2tWrIAsHxQ79cn+sd4reFgGK3frtR9Y5Aazq5P6hH1u8VZlV9Wx\/Z8fW77ytCApGtR1oIfrD9xyr+rh960ew9Tets2p4frT9xyrurB964ew\/8EBoGNdJGCke5ps59mN+1vPYLlZTQQGWVkTd73Bo7TvV61ry2hgbzyE9zSP6lWNXrA6vjvwDz2hpsgNU0VouOnjDI2gW3m2bjxJPOu6iIDOtaLrSw+w7xTVa68s\/sM+85cetd1pYfYd4pqnd87Uewz7zkBLay9KGOBsLTYyk7Xst395sqRhnRhq6hsVyG+c8jeGjfbpO5Suteb9ajbzR373H8lUqHSssBLopHRkixLTvG+y6DeqKhjhaGRMa1o4Af\/XXYWFfpdWfzUneE\/S6s\/mpO8LgN1VU1lG1F\/yM\/FVXAmIamaujjkne9pD7tJFjZhI+Ks+tA2of+Rn4oCiYSfetgH0x4FbPsDmCw\/Bj\/wBfp\/b\/AAK3JAdDTOjo5oXse0G7TY2zabZEHnBWGeWNrjI2y6F6BIvkq\/8AoVQ7vIDvd+aA7f8Ai30P+39l+rt\/II\/VRAdpUDWzojbhbUtHKiOy\/pY78j4lX9cFfSNmjfE8Xa9pae0IDFsAYgbS1N5DaN7SHdFhdp7xbtUNpTSD6mofIc3SvyHWbNHdYLpaVpHU88kL\/OjcWnptuPURY9qtOqvQ3yir8q4XZAA49LjfYHiexdBq2FNEClpY4vSttPPO92bvy7ApdEXAF57xgbV1QD\/Ed+a9CLBtZlA6HSEriDsy2ew8DkARfoIQGn6sz+zout33irUsKwrj+aii8iI2yMBJFyQRffmOCtuHdZb6mqigNO1okda4cTbInd2IDsa4jamg+t\/ocq1qpdev\/wCN\/wCCsWug2poPrv6HKr6o3Xr\/APjf+CAumtinJpY3j0JBfqc0t8dlUPBmkhBWxPcbNuWuPMHjZv8AFbPpbR7aiF8L\/NeLdXMewrBdOaKlpJTFK0gjzTbJ44OaeIQHoZFjWhdY1RAwRva2VrRYF1w4DhmN6lm61ncaYe8fyQH7rdd87B7DvFNULry1HsR+LlWMX4pNc5jjHsbAI33vc3Vj1NuvLU+xH4vQH5rhgIlgl4Frm9oII+BPco7VbUR\/K3Ryta7yjLN2gDm03sL8bX7lo2NNAfLaV0YsHt5UZPrDh1HcsEk8rBLYh0csbukOa4ID0f8A4dD\/AAY\/cb+Sf4dD\/Bj9xv5LJtH61qljQ2SKOQj0rlpPYMl2\/wDNyT+WZ75\/JAajFRRtN2xsaecNAPeAqrrWP7PP1kfiV0MI6wn1lUynMDWBwcdoOJtstJ3di7mts\/s4\/WR+KAznA7\/2hTe3\/S5b0vPuAnftKm+s\/pcvQSAIiIAiIgCIiAq+IMC0tZMZ5Q8PIAOy6wOzuJ6bZdgUnhzD8NFEYoQbFxcS43JJAG\/qAUqiAIiIAo\/TOhYKtnk54w8cOdp5wd4UgiAoztVlDfLyo+3\/AGXa0Tq7pKeZk8Zk24zdt3XF7Ebu1W9EBD4lw5DXMbHNtWY7aGybZ2I8Cujh7A9NRS+WhMm1slvKdcWKsyIAuppHRsVQzYmja9vM4buo7x2LtrAMQ4oq2VU7G1czWtkcABIbAA7kBps2rSiJuBI3oD8viuP\/ACxoueX3\/wCyyb9Lq3+cm\/8AIU\/S6t\/nJv8AyFAT2sPQMNFLFHCXHaaXO2jfjYKc1LfvKk\/Rj8XLPYoqmrfdrZp3nLa5Tz2uN7DrK2rV1hh1FATLbyspBeBnsgbm34oC2qJ03humq\/38TXEbnbnD7QUsiAos2quiPmmVv27+IXF\/lRR+vL3j8lf0QFSw\/gCno52zxvkLmhwAcRblAg+KmsQ6EjrITBLtbBIdyTY3buzUmiAqGidXdJTzMnjMm3Gbtu64vYjd2q3oiAIiIAiIgCIiAIiIAiIgCIiAIiIAiIgCrVT57usoiA40CIgLLDuHUFyIiAIiIAiIgCIiAIiIAiIgCIiA\/9k=";
        $data = [
            "format"=> 1,
            "files" => json_encode(
                [
                    [
                        "name"=>"testfile.jpg",
                        "content"=>base64_encode(file_get_contents("1-5.jpg"))
                    ],
                ]
            )
        ];

        $res = $this->api->call(
            "extended/uploadbase64file",
            $data,
            "POST"
        );
        
        $data = [
            "id"=> "12x227595",
            "cf_pcf_ulf_1016" => $res[0]
        ];
        
        $res = $this->updateContactInformation($data);

        dd($res);
        
        
    }
    public function uploadProfilePic()
    {
        $data= [
            "record"=> "12x227595",
            "files"=>json_encode(
                [
                    [
                        "name"=>"1.png",
                        "content" =>base64_encode(file_get_contents("1.png"))
                    ]
                ]
            )

               ];

               $result = $this->api->call(
                "extended/uploadcontactsimage",
                $data,
                "POST"
               );
       


               dd($result);
    }
    public function getContactRelatedDocs()
    {
         $data= [
            "id"=>"12x227595",
            "relatedType"=>"Documents",
            "relatedLabel"=>"Documents",
        ];

        

        $res = $this->api->call(
            "default/retrieve_related",
            $data,
            "GET"
        );

        dd($res);

        exit;
    }
    public function CreateDocument()
    {

       
        $data = [
            "element"=>json_encode([
                "assigned_user_id"=>"12x227595",
                "notes_title" => "test"
            ]),
            "file"=>json_encode([
                "name" =>"1.png",
                "content" =>base64_encode(file_get_contents("1.png")),
            ])
        ];
        
        $res = $this->api->call(
            "extended/createdocument",
            $data,
            "POST"
        );
        dd($res);
    }
    public function addRelatedDoc()
    {
        $data = [
            
            "sourceRecordId" => "12x227595",
            "relatedRecordId" => "15x228902",
            "relationIdLabel"=>"Documents",
            
        ];
        
        $res = $this->api->call(
            "extended/add_related_records",
            $data,
            "POST"
        );

        
        dd($res);
    }

    public function updateContactInformation($data)
    {
        $contact =  $this->api->call(
            "default/revise",
            [
                "element"=>json_encode($data),
            ],
            "POST"
        );

        return $contact;
    }

    
    public function deleteContant($id)
    {
        $contact =  $this->api->call(
            "default/delete",
            [
                "id"=>$id,
            ],
            "POST"
        );
        return $contact;
    }


    public function createNewContact($data)
    {
        
        $data["cf_931"] = "مراقب";
        $data["assigned_user_id"] = "19x5";
        
        $contact =  $this->api->call(
            "default/create",
            [
                "elementType"=>"Contacts",
                "element"=>json_encode($data),
            ],
            "POST"
        );
        
        return $contact;
    }


    //سمانه نوروزی
    // 12x111
    // cf_pcf_irc_1122
    //0630185646
    //09055116302
    /*
    "firstname"=>"samane",
    "lastname"=>"norozi",
    "mobile"=>"09055116302",
    "CON32"=>"CON32",
    'assigned_user_id' => '19x5',
     */
}
