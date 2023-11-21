import { Text, View } from "react-native";
import { SafeAreaView } from "react-native-safe-area-context";

export default function ProfilePage() {
    return(
        <SafeAreaView>
            <View style={{display: 'flex', justifyContent: 'center', alignItems: 'center'}}>
                <Text>halo dunia</Text>
            </View>
        </SafeAreaView>
    )
}