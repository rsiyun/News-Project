import { View,Button, Text } from "react-native";
import MainHeader from "../../components/MainHeader";
import { SafeAreaView, useSafeAreaInsets } from "react-native-safe-area-context";
import { useNavigation, type CompositeNavigationProp } from '@react-navigation/native';
import type { BottomTabNavigationProp } from '@react-navigation/bottom-tabs';
import type { NativeStackNavigationProp } from '@react-navigation/native-stack';

type HomeStackNavigatorParamList = {
    Home: undefined;
    NDetails: undefined
  };

type HomeScreenNavigationProp =  NativeStackNavigationProp<HomeStackNavigatorParamList>

export default function Home() {
    const navigation = useNavigation<HomeScreenNavigationProp>();
    const insets = useSafeAreaInsets();
    return(
        <SafeAreaView>
            <MainHeader></MainHeader>
            <Text>Home</Text>
            <Button title="pindah ke detail" onPress={()=>navigation.navigate('NDetails')}></Button>
        </SafeAreaView>
        
    )
}