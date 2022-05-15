import { ref, computed, watch } from 'vue';

export default async function useCheckData(checkingModule, fetchingModule){
    const checkModule = computed(()=>{
        store.getters[checkingModule]
    })

    const fetchingData = computed(async()=>{
        if(checkModule){
            return Promise((resolve, reject) => {
                setTimeout(() => {
                    console.log("haha")
                  resolve('fetched');
                }, 100);
              });
        }else{
            try {
                console.log("hahsda")
                await store.dispatch(fetchingModule);
            } catch (error) {
                console.log(
                    error.errorMessage || "Failed to fetch " + fetchingModule
                );
            }
        }
    })

    return{
        checkModule,
        fetchingData
    }
}