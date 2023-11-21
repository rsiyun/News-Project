import { useEffect } from "react";
import { View,Button, Text } from "react-native";
import { SafeAreaView } from "react-native-safe-area-context";

export default function Splash({navigation}:any) {
    useEffect(()=>{
        setTimeout(()=>{
            navigation.replace('Tabs');
        }, 3000)
    }, [navigation])
    return(
        <SafeAreaView>
            <Text>Splash</Text>
        </SafeAreaView>
        
    )
}