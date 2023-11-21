import { View,Button, Text, Image, ScrollView } from "react-native";
import { SafeAreaView } from "react-native-safe-area-context";
import BasicToolbar from "../../components/BasicToolbar";
import Icon from 'react-native-vector-icons/Ionicons'
import { spacing } from "../../style/spacing";
import { typograph } from "../../style/typograph";
import { color } from "../../style/color";
import { useLayoutEffect } from "react";
import { NativeStackNavigationProp } from "@react-navigation/native-stack";

type HomeStackNavigatorParamList = {
    Home: undefined;
    NDetails: undefined
  };

type HomeScreenNavigationProp =  NativeStackNavigationProp<HomeStackNavigatorParamList>

export default function Details({navigation}: {navigation: HomeScreenNavigationProp}) {
    useLayoutEffect(()=>{
        navigation.setOptions({
            headerTitle: ()=>{
                return <Text style={[typograph.textMedium]}>Kumparan</Text>
            },
            headerRight: ()=>(
                <Icon name='home-outline' size={24} color={'#000'}></Icon>
            ),
        })
    },[navigation])
    const contents = ["Menhub Budi Karya Sumadi memprediksi puncak arus mudik dalam perayaan Natal dan Tahun Baru (Nataru) 2023 akan terjadi dalam dua gelombang.", 
    "Gelombang pertama terjadi tepat sebelum perayaan Natal 24-25 Desember 2023 dan tepat sebelum pergantian tahun 31-1 Desember 2023.", "“Diperkirakan puncak mudik I terjadi 22 sampai 23 Desember 2023 sedangkan puncak arus balik 1 26-27 Desember 2023,” kata Budi dalam rapat dengar pendapat bersama Komisi V DPR RI, Selasa (21/11).", "“Lalu puncak arus mudik II 29-30 Desember sedangkan puncak arus balik II 1-2 Januari 2024,” lanjut Budi."]
    return(
        // <SafeAreaView>
            <ScrollView>
            {/* <BasicToolbar navigation={props.navigation}></BasicToolbar> */}
            <View style={[spacing.p16, spacing.pt24, color.bgWhite]}>
                <Text style={[typograph.textLinkXSmall, color.textSeablue]}>NEWS</Text>
                <Text style={[typograph.textLinkLarge, color.slateBlack, spacing.pt8]}>Catat! Puncak Arus Mudik Nataru Diprediksi 22-23 dan 29-30 Desember 2023</Text>
                <Text style={[typograph.textLinkXSmall, color.slateBlack, spacing.pt16]}>KumparanNEWS</Text>
                <Text style={[typograph.textXSmall, color.slateBlack, spacing.pt8, spacing.pb24]}>21 November 2023 17:41 WIB waktu baca 2 menit</Text>
                <View>
                    <Image 
                    style={{width:'auto', height: 200, borderRadius: 12}}
                    source={{
                        uri: 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1608822739/of81t6iyqdkbfmb9sawv.jpg'                        
                    }}></Image>
                </View>
                {contents.map((content)=>(
                    <Text style={[typograph.textMediumSerif, color.slateBlack, spacing.pt16]} id={content}>{content}</Text>
                ))}
            </View>
            </ScrollView>
        // </SafeAreaView>
        
    )
}